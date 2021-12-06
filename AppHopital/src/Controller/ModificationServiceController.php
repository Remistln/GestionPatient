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
            return $this->redirectToRoute('login');
        }

        return $this->render('modification_service/index.html.twig', [
            'controller_name' => 'ModificationServiceController',
            'formService' => $form->createView(),
        ]);
    }
}
