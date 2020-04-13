<?php

namespace App\Controller;

use App\Services\UserLogger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(UserLogger $userLogger): Response
    {
        $userLogger->getUserByEmail();
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    public function testUrlCertif(): Response
    {
        echo 'Redirect URLs with a Trailing Slash';
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

//    public function testUrlCertifWithSlah(): Response
//    {
//        echo 'Redirect URLs with a Trailing Slash hard Coding even without slash Symfony adding Slash';
//        return $this->render('default/index.html.twig', [
//            'controller_name' => 'DefaultController',
//        ]);
//    }

    public function testUrlPattern($date)
    {
        echo 'good';

        return new Response('yes top');
    }
}
