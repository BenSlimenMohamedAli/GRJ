<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AdminArticleController extends Controller
{
    /**
     * @Route("/admin/articles", name="admin_articles")
     */
    public function index()
    {
        return $this->render('admin_article/index.html.twig', [
            'controller_name' => 'AdminArticleController',
        ]);
    }

    /**
     * @Route("/admin/articles/add", name="admin_articles_add")
     */
    public function add(Request $request) {
        return new Response($request->request->get('title') . $request->request->get('article'));
    }
}
