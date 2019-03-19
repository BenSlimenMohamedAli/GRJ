<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminArticleController extends Controller
{
    /**
     * @Route("/admin/article", name="admin_article")
     */
    public function index()
    {
        return $this->render('admin_article/index.html.twig', [
            'controller_name' => 'AdminArticleController',
        ]);
    }
}
