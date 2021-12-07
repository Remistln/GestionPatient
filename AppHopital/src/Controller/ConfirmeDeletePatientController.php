<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeletePatientController extends AbstractController
{
    #[Route('/confirme/delete/patient/{id}', name: 'confirme_delete_patient')]
    public function index(Request $request, $id): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $route = '/delete/patient/'. $id ;

            return $this->render('confirme_delete_patient/index.html.twig', [
                'controller_name' => 'ConfirmeDeletePatientController',
                'route' => $route
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeleteServiceController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
