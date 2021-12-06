<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TableauService;
use App\Entity\Service;

class ModificationServiceController extends AbstractController
{
    #[Route('/modification/service/{id}', name: 'modification_service')]
    public function index($id,Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $manager = new TableauService;
            $service = $manager->GetService($id);

            $form= $this->createFormBuilder($service)
                ->add('label')

                ->getForm();


            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            {
                $data = $request->request->get('form');

                $retourAPI = $manager->PutService($id,$data);
                if ($role == 'ROLE_ADMIN'){
                    return $this->redirectToRoute('accueil_administrateur');
                }else{
                    return $this->redirectToRoute('accueil_infirmier');
                }
            }

            return $this->render('modification_service/index.html.twig', [
                'controller_name' => 'ModificationServiceController',
                'formService' => $form->createView(),
                'role' => $role
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'ModificationLitController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
