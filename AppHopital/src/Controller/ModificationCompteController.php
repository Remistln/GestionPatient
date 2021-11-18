<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModificationCompteController extends AbstractController
{
    #[Route('/modification/compte', name: 'modification_compte')]
    public function index(): Response
    {
        return $this->render('modification_compte/index.html.twig', [
            'controller_name' => 'ModificationCompteController',
        ]);
    }
}
