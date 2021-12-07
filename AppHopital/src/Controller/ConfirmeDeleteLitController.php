<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteLitController extends AbstractController
{
    #[Route('/confirme/delete/lit/{id}', name: 'confirme_delete_lit')]
    public function index(Request $request, $id): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $route = "/delete/lit/" . $id;
            return $this->render('confirme_delete_lit/index.html.twig', [
                'controller_name' => 'ConfirmeDeleteLitController',
                'route' => $route,
                'role' => $role
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeleteServiceController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
