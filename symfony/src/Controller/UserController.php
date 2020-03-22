<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * Creates list of users with given input array
     * @Route("/user/createWithArray", name="user_create_with_array",methods={"POST"})
     */
    public function createWithArray()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * Creates list of users with given input array
     * @Route("/user/createWithList", name="user_create_with_list",methods={"POST"})
     */
    public function createWithList()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * Get user by user name
     * @Route("/user/{username}}", name="user_get_by_name",methods={"GET"})
     */
    public function getByUsername()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * Updated username
     * @Route("/user/{username}}", name="user_update_username",methods={"PUT"})
     */
    public function updateUsername()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * Delete username
     * @Route("/user/{username}}", name="user_delete",methods={"DELETE"})
     */
    public function deleteByUsername()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }


    /**
     * Logs user into the system
     * @Route("/user/login", name="user_login",methods={"GET"})
     * Wouldnt this be more secure as a POST ?
     */
    public function userLogin(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(User::class);

        // get requested parameters
        $username = $request->get('username');
        $password = $request->get('password');

        // get the user
        $found = $repo->findBy(["username"=>$username]);
        if (count($found)) {

            $user=$found[0];

            // check password
            //if(User::checkPassword($password, $user->getPassword())){
            // @todo encrypt passwords
            if ($password == $user->getPassword()) {

                $session = new Session();
                $session->set("user", $username);

                // send the response with heards
                date_default_timezone_set("UTC");
                $datetime = new \DateTime('now + 1 day');
                $expiresAfterFormatted = $datetime->format('Y-m-d H:i:s e');
                return new Response("successful operation", 200, [
                    "X-Expires-After" => $expiresAfterFormatted,
                    "X-Rate-Limit" => 1000 * 1000,
                ]);
            }
        }
        $response = new Response("Invalid username/password supplied", 400);
        return $response;
    }

    /**
     * Logs out current logged in user session
     * @Route("/user/logout", name="user_logout",methods={"GET"})
     */
    public function userLogout()
    {
        $session = new Session();
        $session->set("user", "");
        return new Response("successful operation");
    }

    /**
     * Logs user into the system
     * @Route("/user", name="user_create",methods={"POST"})
     * This can only be done by the logged in user.
     */
    public function userCreate()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }


}
