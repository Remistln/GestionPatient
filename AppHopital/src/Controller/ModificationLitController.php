<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModificationLitController extends AbstractController
{
    #[Route('/modification/lit', name: 'modification_lit')]
    public function index(): Response
    {
        return $this->render('modification_lit/index.html.twig', [
            'controller_name' => 'ModificationLitController',
        ]);
    }
}
