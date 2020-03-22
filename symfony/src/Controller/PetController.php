<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Pet;
use App\Entity\Tag;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PetController extends AbstractController
{
    /**
     * Uploads an image of the pet
     * @Route("/pet/{petId}/uploadImage", name="pet", methods={"POST"})
     */
    public function index(Request $request)
    {
        $message = "File not uploaded and saved";

        $petId = $request->get("petId");

        // check main directory is there else throw
        $uploadDir = __DIR__ . "/../../upload";
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir)) {
                throw new \Exception("Cannot make upload directory");
            }
        }

        // check there is a directory for the petid
        $uploadDir .= "/$petId/";
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir)) {
                throw new \Exception("Cannot make upload directory");
            }
        }

        // move the file to the upload dir
        try{
            $file = $request->files->get('file');
            $filename = $file->getRealPath();
            $savedFilename = $uploadDir . $file->getClientOriginalName();
            if (file_exists($savedFilename)){
                // todo: if filename clashes do a rename or something
            }
            move_uploaded_file($filename, $savedFilename);
            $message = "File ".$file->getClientOriginalName()." uploaded";
        }catch(\Exception $ex){}

        return $this->json([
            'code' => 1,
            'type' => "upload",
            'message' => $message
        ], 200);
    }

    /**
     * Add a new pet to the store
     * @Route("/pet", name="pet_add", methods={"POST"})
     */
    public function petAdd(Request $request)
    {
        try{
            if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                $em = $this->getDoctrine()->getManager();

                $data = json_decode($request->getContent(), true);
                $pet = new Pet();

                // do the category
                $repo = $em->getRepository(Category::class);
                $category = $repo->find($data["category"]["id"]);
                if (!$category) {
                    $category = new Category();
                    $category->setName($data["category"]["name"]);
                    $em->persist($category);
                }
                $pet->setCategory($category);

                // set name
                $pet->setName($data["name"]);

                // set photosUrls
                $pet->setPhotoUrls($data["photoUrls"]);

                // set tags
                $repo = $em->getRepository(Tag::class);
                foreach ($data["tags"] as $tagArray) {
                    $tagId = $tagArray["id"];
                    $tag = $repo->find($tagId);
                    if (!$tag) {
                        $tag = new Tag();
                        $tag->setName($tagArray["name"]);
                        $em->persist($tag);
                    }
                    $pet->addTag($tag);
                }

                // set status
                $pet->setStatus($data["status"]);

                // save the objects
                $em->persist($pet);
                $em->flush();

                // output the end
                $message = "Pet added";
                return $this->json([
                    'code' => 201,
                    'type' => "success",
                    'message' => $message
                ], 201);
            }
        }catch(\Exception $ex){
        }

        // return 405 if error in body format
        return $this->json(null, 405);

    }

    /**
     * Update an existing pet
     * @Route("/pet", name="pet_edit", methods={"PUT"})
     */
    public function petEdit(Request $request)
    {

        // get request objects
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $em = $this->getDoctrine()->getManager();

            $data = json_decode($request->getContent(), true);
            $petId = $data["id"];

            // return 400 Invalid ID supplied
            if (!is_int($petId)) {
                return $this->json(null, 400);
            }

            $repo = $em->getRepository(Pet::class);
            $pet = $repo->find($petId);

            if (!$pet){
                // Pet not found
                return $this->json(null, 404);
            }

            // do the category
            $repo = $em->getRepository(Category::class);
            $category = $repo->find($data["category"]["id"]);
            if (!$category) {
                $category = new Category();
                $category->setName($data["category"]["name"]);
                $em->persist($category);
            }
            $pet->setCategory($category);

            // set name
            $pet->setName($data["name"]);

            // set photosUrls
            $pet->setPhotoUrls($data["photoUrls"]);

            // set tags
            $repo = $em->getRepository(Tag::class);
            foreach ($data["tags"] as $tagArray) {
                $tagId = $tagArray["id"];
                $tag = $repo->find($tagId);
                if (!$tag) {
                    $tag = new Tag();
                    $tag->setName($tagArray["name"]);
                    $em->persist($tag);
                }
                // if tag not already set, set it
                $currentTags = $pet->getTags();
                if ($currentTags->indexOf($tag) === FALSE) {
                    $pet->addTag($tag);
                }
            }

            // set status
            $pet->setStatus($data["status"]);

            // save the objects
            $em->persist($pet);
            $em->flush();

            return $this->json([
                'code' => 201,
                'type' => "success",
                'message' => "Pet updated"
            ], 200);

        }

        // Validation exception
        return $this->json(null, 405);

    }

    /**
     * Finds Pets by status
     * @Route("/pet/findByStatus", name="pet_find_by_status", methods={"GET"})
     */
    public function petFindByStatus(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Pet::class);

        // get status
        $statuses = $request->get("statuses");

        $pets = [];
        foreach (explode(',',$statuses) as $status) {
            if (in_array($status, array("available", "pending", "sold"))) {
                $foundPets = $repo->findBy(["status"=>$status]);
                $pets = array_merge($foundPets, $pets);
            } else {
                // return 400 Invalid status value
                return $this->json("Invalid status value", 400);
            }
        }

        $serializer = $this->container->get('serializer');
        $serializedObject = $serializer->serialize($pets, 'json');

        return new Response($serializedObject, 200);
    }

    /**
     * Find Pet by tag
     * @deprecated
     * @Route("/pet/findByTags", name="pet_find_by_tag", methods={"GET"})
     */
    public function petFindByTag(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // get status
        $tags = $request->get("tags");
        $tags = explode(",",$tags);
        $pets = [];

        $dql = 'SELECT p,c,t FROM App\Entity\Pet p 
                    LEFT JOIN p.category c
                    LEFT JOIN p.tags t
                        WHERE ';
        foreach($tags as $k=>$tag){
            $dql .= 't.name=\'' . $tag . '\'';
            if ($k != count($tags)-1){
                $dql .= ' OR ';
            }
        }
        $query = $em->createQuery($dql);
        $objects = $query->getArrayResult();
        $pets = array_merge($objects, $pets);

        if (count($pets)){
            $serializer = $this->container->get('serializer');
            $serializedObject = $serializer->serialize($pets, 'json');

            return new Response($serializedObject, 200);
        }

        return new Response("Invalid tag value", 400);

    }

    /**
     * Find Pet by id
     * @Route("/pet/{petId}", name="pet_find_by_id", methods={"GET"})
     */
    public function petFindById(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Pet::class);

        $petId = (int)$request->get("petId");
        if (!is_integer($petId)) {
            // if the petId NaN
            return new Response('Invalid ID supplied', 400);
        }
        $foundPet = $repo->find($petId);

        if ($foundPet) {
            $serializer = $this->container->get('serializer');
            $serializedObject = $serializer->serialize($foundPet, 'json');
            return new Response($serializedObject, 200);
        }

        //Pet not found
        return $this->json(null, 404);
    }

    /**
     * Updates a pet in the store with form data
     * @Route("/pet/{petId}", name="pet_update", methods={"POST"})
     */
    public function petUpdate(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Pet::class);

        $petId = (int)$request->get("petId");

        if (!is_integer($petId)) {
            // if the petId NaN
            return new Response('Invalid ID supplied', 400);
        }

        // find pet
        $foundPet = $repo->find($petId);

        if ($foundPet) {
            $name = $request->get('name');
            $status = $request->get('status');

            // set the values
            $foundPet->setName($name);
            $foundPet->setStatus($status);

            // save
            $em->persist($foundPet);
            $em->flush();

            return new Response("", 200);
        }
        return new Response("Invalid input", 405);
    }



    /**
     * Deletes a pet
     * @Route("/pet/{petId}", name="pet_delete", methods={"DELETE"})
     */
    public function petDelete(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Pet::class);

        $petId = (int)$request->get("petId");

        // todo: do something with this
        $apiKey = $request->get("api_key");

        if (!is_integer($petId)) {
            // if the petId NaN
            return new Response('Invalid ID supplied', 400);
        }

        // find pet
        $foundPet = $repo->find($petId);

        if ($foundPet) {
            $em->remove($foundPet);
            $em->flush();
            return new Response("", 200);
        }

        return new Response("Pet not found", 404);

    }
}
