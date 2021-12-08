<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Service\TableauLit;
use App\Service\TableauPatient;
use App\Service\TableauService;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class DeplacementServiceController extends AbstractController
{
    #[Route('/deplacement/service/{id}', name: 'deplacement_service')]
    public function index($id, Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
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
                ->add('chambre', IntegerType::class,[
                    'label' => 'Numéro de la chambre',
                    'required' => true
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
                    $data['chambre'] = intval($data['chambre']);
                    $managerLit = new TableauLit();
                    $managerLit->PutLit($patient->getLit(),array('chambre' => $data['chambre'] ));
                    unset($data['chambre'] );
                    $retourApi = $managerPatient->PutPatient($id,$data);
                    if ($role == 'ROLE_ADMIN'){
                        return $this->redirectToRoute('accueil_administrateur');
                    }else{
                        return $this->redirectToRoute('accueil_infirmier');
                    }
                }
            }
            return $this->render('deplacement_service/index.html.twig', [
                'controller_name' => 'DeplacementServiceController',
                'formService' => $form->createView(),
                'role'=> $role
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeplacementServiceController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }

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
