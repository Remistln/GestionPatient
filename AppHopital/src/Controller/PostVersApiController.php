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

        $infirmiers = new TableauInfirmier;
        $infirmiers->DeleteInfirmier(47);

        return $this->render('post_vers_api/index.html.twig', [
            'controller_name' => 'PostVersApiControllerController',
            'title'=> 'Accueil',
        ]);

    }
}
