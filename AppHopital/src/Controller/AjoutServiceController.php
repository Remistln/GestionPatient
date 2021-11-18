<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutServiceController extends AbstractController
{
    #[Route('/ajout/service', name: 'ajout_service')]
    public function index(): Response
    {
        return $this->render('ajout_service/index.html.twig', [
            'controller_name' => 'AjoutServiceController',
        ]);
    }
}
