<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserHomeController extends AbstractController
{
    /**
     * @Route("/", name="user_home")
     */
    public function index()
    {
        return $this->render('user_home/index.html.twig', [
            'controller_name' => 'UserHomeController',
        ]);
    }
}
