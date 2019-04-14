<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminProfileController extends AbstractController
{
    /**
     * @Route("/admin/profile", name="admin_profile")
     */
    public function index()
    {
        return $this->render('admin_profile/index.html.twig', [
            'controller_name' => 'AdminProfileController',
        ]);
    }
}
