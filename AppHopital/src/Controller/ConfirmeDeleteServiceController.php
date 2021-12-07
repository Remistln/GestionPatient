<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteServiceController extends AbstractController
{
    #[Route('/confirme/delete/service/{id}', name: 'confirme_delete_service')]
    public function index(Request $request, $id): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            $route = "/delete/service/" . $id;
            return $this->render('confirme_delete_service/index.html.twig', [
                'controller_name' => 'ConfirmeDeleteServiceController',
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
