<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteAdminController extends AbstractController
{
    #[Route('/confirme/delete/admin/{id}', name: 'confirme_delete_admin')]
    public function index(Request $request, $id): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            $route = "/delete/admin/" . $id;
            return $this->render('confirme_delete_admin/index.html.twig', [
                'controller_name' => 'ConfirmeDeleteAdminController',
                'route' => $route
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'ConfirmeDeleteAdminController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
