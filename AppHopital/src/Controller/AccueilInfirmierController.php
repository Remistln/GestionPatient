<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TableauPatient;
use App\Service\TableauLit;
use App\Service\TableauInfirmier;
use App\Service\TableauAdmin;
use App\Service\TableauService;


class AccueilInfirmierController extends AbstractController
{
    #[Route('/accueil/infirmier', name: 'accueil_infirmier')]
    public function index(): Response
    {
        $patients = new TableauPatient;
        $tableauPatients = $patients->GetPatients();

        $lits = new TableauLit;
        $tableauLits = $lits->GetLits();

/*
        $infirmiers = new TableauInfirmier;
        $tableauInfirmiers = $infirmiers->GetInfirmiers();

        $admins = new TableauAdmin;
        $tableauAdmins = $admins->GetAdmins();
*/
        $service = new TableauService;
        $tableauServices = $service->GetServices();


        return $this->render('accueil_infirmier/index.html.twig', [
            'controller_name' => 'AccueilInfirmierController',
            'title'=> 'Accueil', 'tableauPatients' => $tableauPatients,
            'tableauLits' => $tableauLits, 'tableauServices' => $tableauServices,
        ]);
    }


}
