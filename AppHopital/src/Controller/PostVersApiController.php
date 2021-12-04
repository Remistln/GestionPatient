<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TableauPatient;
use App\Service\TableauLit;
use App\Service\TableauInfirmier;
use App\Service\TableauAdmin;
use App\Service\TableauService;

class PostVersApiController extends AbstractController
{
    #[Route('/post/patient', name: 'post_patient')]
    public function PostPatient():Response
    {
        $patients = new TableauPatient;
        $tableauPatients = $patients->GetPatient(50);
        dump($tableauPatients);

        $lits = new TableauLit;
        $tableauLits = $lits->GetLit(32);
        dump($tableauLits);

        $infirmiers = new TableauInfirmier;
        $tableauInfirmiers = $infirmiers->GetInfirmier(43);
        dump($tableauInfirmiers);

        $admins = new TableauAdmin;
        $tableauAdmins = $admins->GetAdmin(44);
        dump($tableauAdmins);

        $service = new TableauService;
        $tableauServices = $service->GetService(53);
        dump($tableauServices);

        return $this->render('post_vers_api/index.html.twig', [
            'controller_name' => 'PostVersApiControllerController',
            'title'=> 'Accueil',
        ]);

    }
}
