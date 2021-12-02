<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutInfirmierController extends AbstractController
{
    #[Route('/ajout/infirmier', name: 'ajout_infirmier')]
    public function index(): Response
    {
        return $this->render('ajout_infirmier/index.html.twig', [
            'controller_name' => 'AjoutInfirmierController',
        ]);
    }
}
