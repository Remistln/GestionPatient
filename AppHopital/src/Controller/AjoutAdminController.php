<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutAdminController extends AbstractController
{
    #[Route('/ajout/admin', name: 'ajout_admin')]
    public function index(): Response
    {
        return $this->render('ajout_admin/index.html.twig', [
            'controller_name' => 'AjoutAdminController',
        ]);
    }
}
