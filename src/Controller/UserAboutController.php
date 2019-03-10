<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserAboutController extends AbstractController
{
    /**
     * @Route("/user/about", name="user_about")
     */
    public function index()
    {
        return $this->render('user_about/index.html.twig', [
            'controller_name' => 'UserAboutController',
        ]);
    }
}
