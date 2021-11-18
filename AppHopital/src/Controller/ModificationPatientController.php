<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModificationPatientController extends AbstractController
{
    #[Route('/modification/patient', name: 'modification_patient')]
    public function index(): Response
    {
        return $this->render('modification_patient/index.html.twig', [
            'controller_name' => 'ModificationPatientController',
        ]);
    }
}
