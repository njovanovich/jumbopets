<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PetController extends AbstractController
{
    /**
     * Uploads an image of the pet
     * @Route("/pet/{petId}/uploadImage", name="pet", methods={"POST"})
     */
    public function index()
    {
        return $this->json([
            'code' => 0,
            'type' => "string",
            'message' => "string"
        ], 200);
    }

    /**
     * Add a new pet to the store
     * @Route("/pet", name="pet_add", methods={"POST"})
     */
    public function petAdd()
    {
        // return 405 if error in body format
        return $this->json(null, 405);

        return $this->json([
            'code' => 0,
            'type' => "string",
            'message' => "string"
        ], 200);


    }

    /**
     * Update an existing pet
     * @Route("/pet", name="pet_edit", methods={"PUT"})
     */
    public function petEdit()
    {
        // return 405 if error in body format
        return $this->json(null, 405);

        return $this->json([
            'code' => 0,
            'type' => "string",
            'message' => "string"
        ], 200);
    }

    /**
     * Finds Pets by status
     * @Route("/pet/findByStatus", name="pet_find_by_status", methods={"GET"})
     */
    public function petFindByStatus()
    {
        // return 405 if error in body format
        return $this->json(null, 405);

        return $this->json([
            'code' => 0,
            'type' => "string",
            'message' => "string"
        ], 200);
    }

    /**
     * Find Pet by id
     * @Route("/pet/{petId}", name="pet_find_by_id", methods={"GET"})
     */
    public function petFindById()
    {
        // return 405 if error in body format
        return $this->json(null, 405);

        return $this->json([
            'code' => 0,
            'type' => "string",
            'message' => "string"
        ], 200);
    }

    /**
     * Updates a pet in the store with form data
     * @Route("/pet/{petId}", name="pet_update", methods={"POST"})
     */
    public function petUpdate()
    {
        // return 405 if error in body format
        return $this->json(null, 405);

        return $this->json([
            'code' => 0,
            'type' => "string",
            'message' => "string"
        ], 200);
    }



    /**
     * Deletes a pet
     * @Route("/pet/{petId}", name="pet_delete", methods={"DELETE"})
     */
    public function petDelete()
    {
        // return 405 if error in body format
        return $this->json(null, 405);

        return $this->json([
            'code' => 0,
            'type' => "string",
            'message' => "string"
        ], 200);
    }
}
