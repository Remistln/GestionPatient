<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModificationServiceController extends AbstractController
{
    #[Route('/modification/service', name: 'modification_service')]
    public function index(): Response
    {
        return $this->render('modification_service/index.html.twig', [
            'controller_name' => 'ModificationServiceController',
        ]);
    }
}
