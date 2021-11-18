<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutPatientController extends AbstractController
{
    #[Route('/ajout/patient', name: 'ajout_patient')]
    public function index(): Response
    {
        return $this->render('ajout_patient/index.html.twig', [
            'controller_name' => 'AjoutPatientController',
        ]);
    }
}
