<?php

namespace App\Controller;

use App\Service\TableauPatient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeletePatientController extends AbstractController
{
    #[Route('/delete/patient/{id}', name: 'delete_patient')]
    public function index($id)
    {
        $manager = new TableauPatient;
        $appelApi = $manager->DeletePatient($id);

        
        return $this->redirectToRoute('login');
        

    }
}
