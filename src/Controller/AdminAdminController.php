<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminAdminController extends Controller
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
    
    /**
     * 
     * util functions  :
     * getProfilePicturesPath() 
     */

    private function getProfilePicturesPath() 
    {
        return $this->get('kernel')->getProjectDir() . '/public/profile_pictures/admins';
    }
}
