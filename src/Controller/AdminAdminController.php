<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

use App\Entity\Admin;

class AdminAdminController extends Controller
{
    /**
     * @Route("/admin/admins/{page}", name="admin_admins", defaults={"page"=1})
     */
    public function index($page)
    {
        $admins = $this->getDoctrine()
        ->getRepository(Admin::class)
        ->findBy(array(), array('name' => 'ASC'),3,($page-1)*3);

        $entityManager = $this->getDoctrine()->getManager();
        $query = $entityManager->createQuery("SELECT count(a.id) FROM App\Entity\Admin a");

        $pages = $query->getResult();

        if($pages[0][1] % 3 != 0) {
            $pages = ($pages[0][1] /3) + 1; 
        } else {
            $pages = ($pages[0][1] /3);
        }

        return $this->render('admin_admin/index.html.twig', [
            'controller_name' => 'AdminAdminController',
            'admins' => $admins,
            'pages' => $pages
        ]);
    }
    
    /**
     * @Route("/admin/add-admin", name="add_admin")
     */
    public function add(Request $request, UserPasswordEncoderInterface  $encoder) {
        $username = $request->request->get('username');
        $email = $request->request->get('email');
        $picture = $request->files->get('picture');
        // Password for new users added by the super admin
        $password = '123456';
        
        // test the image type 
        $image_types = array("png", "jpg","jpeg");

        $admin = new Admin();

        if (!$picture) {
            $admin->setPicture('default/default.png');
        } else if (in_array(strtolower($picture->guessExtension()), $image_types)) {
            // verify image size 
            if($picture->getSize() > 2000000) {
                return new Response('4');
            }
            $picture_name = preg_replace('/\s+/', '_', $username ). $this->generateUniqueFileName() .'.'.$picture->guessExtension() ;
            $admin->setPicture($picture_name);
        } else {
            // return error num 1
            return new Response('1');
        }

        $entityManager = $this->getDoctrine()->getManager();

        $admin->setName($username);
        // password encoding
        $encoded = $encoder->encodePassword($admin, $password);
        $admin->setPassword($encoded);
        $admin->setEmail($email);
        $admin->setRole(0);

        try {
            $entityManager->persist($admin);
            $entityManager->flush();

            if($picture) {
                try {
                    $picture->move(
                        $this->getProfilePicturesPath(),
                        $picture_name
                    );
                } catch (FileException $fe) { 
                    // return error num 2
                    return new Response('2');
                }
            }
        } catch(UniqueConstraintViolationException $e) {
            // return error num 3
            return new Response('3');
        }

        // return success with 0 errors
        return new Response('0');
    }

    /**
     * @Route("/admin/delete-admin", name="delete_admin")
     */
    public function delete(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository(Admin::class);

        $admin = $repository->find($request->request->get('admin_id'));

        $entityManager->remove($admin);
        $entityManager->flush();

        return $this->redirect('/admin/admins/1', 301);
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

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}