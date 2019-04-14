<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserContactController extends AbstractController
{
    /**
     * @Route("/contact", name="user_contact")
     */
    public function index()
    {
        return $this->render('user_contact/index.html.twig', [
            'controller_name' => 'UserContactController',
        ]);
    }
}
