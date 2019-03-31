<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserNewsController extends AbstractController
{
    /**
     * @Route("/news", name="user_news")
     */
    public function index()
    {
        return $this->render('user_news/index.html.twig', [
            'controller_name' => 'UserNewsController',
        ]);
    }
}
