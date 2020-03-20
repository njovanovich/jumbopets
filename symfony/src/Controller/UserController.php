<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * Creates list of users with given input array
     * @Route("/user/createWithArray", name="user_create_with_array",methods={POST})
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
     * @Route("/user/createWithList", name="user_create_with_list",methods={POST})
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
     * @Route("/user/{username}}", name="user_get_by_name",methods={GET})
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
     * @Route("/user/{username}}", name="user_update_username",methods={PUT})
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
     * @Route("/user/{username}}", name="user_delete",methods={DELETE})
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
     * @Route("/user/login}", name="user_login",methods={GET})
     * Wouldnt this be more secure as a POST ?
     */
    public function userLogin()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * Logs out current logged in user session
     * @Route("/user/logout}", name="user_logout",methods={GET})
     */
    public function userLogout()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * Logs user into the system
     * @Route("/user", name="user_create",methods={POST})
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
