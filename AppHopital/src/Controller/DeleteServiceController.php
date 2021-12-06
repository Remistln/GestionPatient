<?php

namespace App\Controller;

use App\Service\TableauService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteServiceController extends AbstractController
{
    #[Route('/delete/service/{id}', name: 'delete_service')]
    public function index(Request $request, $id)
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $manager = new TableauService;
            $appelApi = $manager->DeleteService($id);
            if ($role == 'ROLE_ADMIN'){
                return $this->redirectToRoute('accueil_administrateur');
            }else{
                return $this->redirectToRoute('accueil_infirmier');
            }
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeleteServiceController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
