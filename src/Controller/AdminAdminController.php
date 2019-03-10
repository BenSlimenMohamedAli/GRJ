<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminAdminController extends AbstractController
{
    /**
     * @Route("/admin/admin", name="admin_admin")
     */
    public function index()
    {
        return $this->render('admin_admin/index.html.twig', [
            'controller_name' => 'AdminAdminController',
        ]);
    }
}
