<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $patients = new TableauPatient;
            $tableauPatients = $patients->GetPatients();

            $lits = new TableauLit;
            $tableauLits = $lits->GetLits();

            $service = new TableauService;
            $tableauServices = $service->GetServices();


            return $this->render('accueil_infirmier/index.html.twig', [
                'controller_name' => 'AccueilInfirmierController',
                'title'=> 'Accueil',
                'tableauPatients' => $tableauPatients,
                'tableauLits' => $tableauLits,
                'tableauServices' => $tableauServices,
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'AccueilInfirmierController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }

}
