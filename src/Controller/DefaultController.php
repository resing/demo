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
}
