<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeletePatientController extends AbstractController
{
    #[Route('/confirme/delete/patient/{id}', name: 'confirme_delete_patient')]
    public function index($id): Response
    {
        $route = '/delete/patient/'. $id ;
        dump($route);

        return $this->render('confirme_delete_patient/index.html.twig', [
            'controller_name' => 'ConfirmeDeletePatientController',
            'route' => $route
        ]);
    }
}
