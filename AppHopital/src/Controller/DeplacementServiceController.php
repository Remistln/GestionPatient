<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Service\TableauPatient;
use App\Service\TableauService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class DeplacementServiceController extends AbstractController
{
    #[Route('/deplacement/service/{id}', name: 'deplacement_service')]
    public function index($id, Request $request): Response
    {
        $managerPatient = new TableauPatient;
        $patient = $managerPatient->GetPatient($id);

        $managerService = new TableauService;
        $services = $managerService->GetServices();

        $indexeLit = $this->trouverIndexeService($patient,$services);

        $services = $this->servicePatientPremier($indexeLit,$services);
        
        $form = $this->createFormBuilder()
                            ->add('service', ChoiceType::class, [
                                'mapped' => false,
                                'choices'  => $services,
                                'choice_label' => 'label'
                            ]
                            )
                            ->add('litChoix', CheckboxType::class, [
                                'mapped' => false,
                                'label'    => 'Le Patient change de lit',
                                'required' => false,
                                
                            ])
                            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $data = $request->request->get('form');
            $data["service"] = $services[$data["service"]]->getId();
            dump($data);
            
            if (isset($data["litChoix"]))
            {
                unset($data["litChoix"]);
                $retourApi = $managerPatient->PutPatient($id,$data);
                return $this->redirectToRoute('deplacement_lit',array('id' =>$id));
            } else {
                $retourApi = $managerPatient->PutPatient($id,$data);
                return $this->redirectToRoute('login');
            }
        }

        return $this->render('deplacement_service/index.html.twig', [
            'controller_name' => 'DeplacementServiceController',
            'formService' => $form->createView(),
        ]);
    }

    private function trouverIndexeService($patient,$services)
    {
        $tableauIndexes = [];
        foreach( $services as $service)
        {
            array_push($tableauIndexes, $service->getId());
        }
        return array_search($patient->getService(), $tableauIndexes);
    }

    private function servicePatientPremier($indexeService,$services)
    {
       
        $tableau = array($services[$indexeService]);

        $dernierCle = array_key_last($services);

        for ($i=0; $i <= $dernierCle; $i++) { 
            if ($i != $indexeService)
            {
                array_push($tableau, $services[$i]);
            }
        }

        return $tableau;

    }
}
