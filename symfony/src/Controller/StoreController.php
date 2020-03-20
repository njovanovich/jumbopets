<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    /**
     * Place an order for a pet
     * @Route("/store/order", name="store_order",methods={"POST"})
     */
    public function storeOrder()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/StoreController.php',
        ]);
    }

    /**
     * Find purchase order by ID
     * @Route("/store/order/orderId", name="store_get_order",methods={"GET"})
     */
    public function storeGetOrder()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/StoreController.php',
        ]);
    }

    /**
     * Delete purchase order by ID
     * @Route("/store/order/orderId", name="store_delete_order",methods={"DELETE"})
     *
     *
     */
    public function storeDeleteOrder()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/StoreController.php',
        ]);
    }

    /**
     * Returns pet inventories by status
     * @Route("/store/inventory", name="store_inventory",methods={"GET"})
     */
    public function storeGetInventory()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/StoreController.php',
        ]);
    }

}
