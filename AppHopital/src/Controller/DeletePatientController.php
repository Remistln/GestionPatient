<?php

namespace App\Controller;

use App\Service\TableauPatient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeletePatientController extends AbstractController
{
    #[Route('/delete/patient/{id}', name: 'delete_patient')]
    public function index(Request $request, $id)
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $manager = new TableauPatient;
            $appelApi = $manager->DeletePatient($id);
            if ($role == 'ROLE_ADMIN'){
                return $this->redirectToRoute('accueil_administrateur');
            }else{
                return $this->redirectToRoute('accueil_infirmier');
            }
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeletePatientController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
