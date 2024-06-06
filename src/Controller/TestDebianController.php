<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestDebianController extends AbstractController
{
    #[Route('/test/debian', name: 'app_test_debian')]
    public function index(): Response
    {
        return $this->render('test_debian/index.html.twig', [
            'controller_name' => 'TestDebianController',
        ]);
    }
}
