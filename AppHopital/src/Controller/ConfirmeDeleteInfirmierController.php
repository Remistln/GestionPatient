<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteInfirmierController extends AbstractController
{
    #[Route('/confirme/delete/infirmier/{id}', name: 'confirme_delete_infirmier')]
    public function index(Request $request, $id): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            $route = "/delete/infirmier/" . $id;
            return $this->render('confirme_delete_infirmier/index.html.twig', [
                'controller_name' => 'ConfirmeDeleteInfirmierController',
                'route' => $route
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'ConfirmeDeleteInfirmierController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
