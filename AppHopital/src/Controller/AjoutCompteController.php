<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutCompteController extends AbstractController
{
    #[Route('/ajout/compte', name: 'ajout_compte')]
    public function index(): Response
    {
        return $this->render('ajout_compte/index.html.twig', [
            'controller_name' => 'AjoutCompteController',
        ]);
    }
}
