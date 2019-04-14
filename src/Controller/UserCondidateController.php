<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserCondidateController extends AbstractController
{
    /**
     * @Route("/user/condidate", name="user_condidate")
     */
    public function index()
    {
        return $this->render('user_condidate/index.html.twig', [
            'controller_name' => 'UserCondidateController',
        ]);
    }
}
