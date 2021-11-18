<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilAdministrateurController extends AbstractController
{
    #[Route('/accueil/administrateur', name: 'accueil_administrateur')]
    public function index(): Response
    {
        return $this->render('accueil_administrateur/index.html.twig', [
            'controller_name' => 'AccueilAdministrateurController',
        ]);
    }
}
