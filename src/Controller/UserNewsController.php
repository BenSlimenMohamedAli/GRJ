<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
class UserNewsController extends AbstractController
{
    /**
     * @Route("/news/{page}", name="user_news", defaults={"page"=1})
     */
    public function index($page)
    {
        $news = $this->getDoctrine()
        ->getRepository(Article::class)
        ->findBy(array(), array('last_modified' => 'DESC'),6,($page-1)*6);

        $entityManager = $this->getDoctrine()->getManager();
        $query = $entityManager->createQuery("SELECT count(a.id) FROM App\Entity\Article a");

        $pages = $query->getResult();

        if($pages[0][1] % 6 != 0) {
            $pages = ($pages[0][1] /6) + 1; 
        } else {
            $pages = ($pages[0][1] /6);
        }

        return $this->render('user_news/index.html.twig', [
            'controller_name' => 'UserNewsController',
            'news' => $news,
            'pages' => $pages
        ]);
    }

    /**
     * @Route("/news/details/{article}",name="user_news_details")
     */
    public function details($article) {
        $repository = $this->getDoctrine()->getRepository(Article::class);

        $news = $repository->find($article);



        return $this->render('user_news/details.html.twig',[
            'news' => $news
        ]);
    }
}
