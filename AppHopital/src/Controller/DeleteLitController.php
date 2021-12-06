<?php

namespace App\Controller;

use App\Service\TableauLit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteLitController extends AbstractController
{
    #[Route('/delete/lit/{id}', name: 'delete_lit')]
    public function index(Request $request, $id)
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $manager = new TableauLit;
            $appelApi = $manager->DeleteLit($id);
            if ($role == 'ROLE_ADMIN'){
                return $this->redirectToRoute('accueil_administrateur');
            }else{
                return $this->redirectToRoute('accueil_infirmier');
            }
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeleteLitController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
