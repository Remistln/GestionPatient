<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutLitController extends AbstractController
{
    #[Route('/ajout/lit', name: 'ajout_lit')]
    public function index(): Response
    {
        return $this->render('ajout_lit/index.html.twig', [
            'controller_name' => 'AjoutLitController',
        ]);
    }
}
