<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TableauPatient;

class AccueilInfirmierController extends AbstractController
{
    #[Route('/accueil/infirmier', name: 'accueil_infirmier')]
    public function index(): Response
    {
        $patients = new TableauPatient;
        $test = $patients->GetPatients();
        dump($test);
        return $this->render('accueil_infirmier/index.html.twig', [
            'controller_name' => 'AccueilInfirmierController',
            'title'=> 'Accueil',
        ]);
    }


}
