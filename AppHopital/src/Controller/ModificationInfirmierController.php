<?php

namespace App\Controller;

use App\Entity\Infirmier;
use App\Service\TableauInfirmier;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ModificationInfirmierController extends AbstractController
{
    #[Route('/modification/infirmier/{id}', name: 'modification_infirmier')]
    public function index($id, Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){

            
            $infirmierGet = new TableauInfirmier();
            $infirmier = $infirmierGet->GetInfirmier($id);
            $entiteesInfirmier = $infirmierGet->GetInfirmiers();
            dump($entiteesInfirmier);

            $form = $this->createFormBuilder($infirmier)
                ->add('nom')
                ->add('prenom')
                ->add('identifiant')
                ->add('mdp')
                ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $data = $request->request->get('form');
                
                $retourApi = $infirmierGet->PutInfirmier($id, $data);
                return $this->redirectToRoute('login');
            }


            return $this->render('modification_infirmier/index.html.twig', [
                'controller_name' => 'ModificationInfirmierController',
                'formInfirmier' => $form->createView(),
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'ModificationInfirmierController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
