<?php

namespace App\Controller;

use App\Service\TableauLit;
use App\Service\TableauPatient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DeplacementLitController extends AbstractController
{
    #[Route('/deplacement/lit/{id}', name: 'deplacement_lit')]
    public function index($id, Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $managerPatients = new TableauPatient;
            $patient = $managerPatients->GetPatient($id);

            $managerLits = new TableauLit;
            $lits = $managerLits->GetLits();

            $indexeLit = $this->trouverIndexeLit($patient,$lits);

            $lits = $this->litPatientPremier($indexeLit,$lits, $patient->getService());

            $form = $this->createFormBuilder()
                ->add('lit', ChoiceType::class, [
                        'mapped' => false,
                        'choices'  => $lits,
                        'choice_label' => function($lit) {return $lit->__toString();}
                    ]
                )
                ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $data = $request->request->get('form');
                $data["lit"] = $lits[$data["lit"]]->getId();
                $retourApi = $managerPatients->PutPatient($id,$data);
                if ($role == 'ROLE_ADMIN'){
                    return $this->redirectToRoute('accueil_administrateur');
                }else{
                    return $this->redirectToRoute('accueil_infirmier');
                }
            }
            return $this->render('deplacement_lit/index.html.twig', [
                'controller_name' => 'DeplacementLitController',
                'formLit' => $form->createView(),
                'role'=> $role

            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeleteLitController',
                'error' => "Vous n'??tes pas autoris?? ?? aller sur cette page"
            ]);
        }

    }

    private function trouverIndexeLit($patient,$lits)
    {
        $tableauIndexes = [];
        foreach( $lits as $lit)
        {
            array_push($tableauIndexes, $lit->getId());
        }
        return array_search($patient->getLit(), $tableauIndexes);
    }

    private function litPatientPremier($indexeLit,$lits, $service)
    {
       
        $tableau = array($lits[$indexeLit]);

        $dernierCle = array_key_last($lits);

        for ($i=0; $i <= $dernierCle; $i++) { 
            if ($i != $indexeLit && $lits[$i]->getService() == $service)
            {
                array_push($tableau, $lits[$i]);
            }
        }

        return $tableau;

    }
}


        /*
        $serviceGet = new TableauService;
        $entiteesService = $serviceGet->GetServices();
        
        $indexeService = $this->trouverIndexeService($patient,$entiteesService);

        $entiteesService = $this->servicePatientPremier($indexeService,$entiteesService);
*/