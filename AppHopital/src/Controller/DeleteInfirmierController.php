<?php

namespace App\Controller;

use App\Service\TableauInfirmier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteInfirmierController extends AbstractController
{
    #[Route('/delete/infirmier/{id}', name: 'delete_infirmier')]
    public function index(Request $request, $id)
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            $manager = new TableauInfirmier;
            $appelApi = $manager->DeleteInfirmier($id);
            return $this->redirectToRoute('accueil_administrateur');
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeleteInfirmierController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
        

    }
}
