<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Service\TableauAdmin;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModificationAdminController extends AbstractController
{
    #[Route('/modification/admin/{id}', name: 'modification_admin')]
    public function index($id, Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            
            $adminGet = new TableauAdmin;
            $admin = $adminGet->GetAdmin($id);

            $entiteesAdmin = $adminGet->GetAdmins();
            dump($entiteesAdmin);

            $form = $this->createFormBuilder($admin)
                ->add('nom')
                ->add('prenom')
                ->add('identifiant')
                ->add('mdp')
                ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $data = $request->request->get('form');
                
                $retourApi = $adminGet->PutAdmin($id,$data);
                return $this->redirectToRoute('login');
            }


            return $this->render('modification_admin/index.html.twig', [
                'controller_name' => 'ModificationAdminController',
                'formAdmin' => $form->createView(),
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'ModificationAdminController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
