<?php

namespace App\Controller;

use App\Entity\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\TableauService;

class AjoutServiceController extends AbstractController
{
    #[Route('/ajout/service', name: 'ajout_service')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            $service = new Service();

            $form= $this->createFormBuilder($service)
                ->add('label')

                ->getForm();


            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            {
                $data = $request->request->get('form');
                $manager = new TableauService;
                $retourAPI = $manager->PostService($data);
                return $this->redirectToRoute('accueil_administrateur');
            }


            return $this->render('ajout_service/index.html.twig', [
                'controller_name' => 'AjoutServiceController',
                'formService' => $form->createView(),
                'role' => $role
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'AjoutServiceController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }

    }
}
