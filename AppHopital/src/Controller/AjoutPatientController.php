<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Service;
use App\Service\TableauService;
use App\Service\TableauPatient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AjoutPatientController extends AbstractController
{
    #[Route('/ajout/patient', name: 'ajout_patient')]
    public function index(Request $request): Response
    {
        $patient = new Patient();

        $serviceGet = new TableauService;
        $entiteesService = $serviceGet->GetServices();
        
        
        $form = $this->createFormBuilder($patient)
                    ->add('nom')
                    ->add('prenom')
                    ->add('service', ChoiceType::class, [
                        'mapped' => false,
                        'choices'  => $entiteesService,
                        'choice_label' => 'label'
                    ]
                    )
                    ->add('dateNaissance', BirthdayType::class, [
                        'format' => 'yyyy-MM-dd', 'attr' => [
                            'required' => false
                        ]
                    ])
                    ->add('lieuNaissance')
                    ->add('numeroSS')
                    ->add('probleme')
                    ->add('description')
                    
                    ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            $data = $request->request->get('form');
            
            $data["dateNaissance"] = $data["dateNaissance"]["year"] . '-' . $data["dateNaissance"]["month"] . '-' . $data["dateNaissance"]["day"] ;
            $data["numeroSS"] = intval($data["numeroSS"]);

            $data["service"] = $entiteesService[$data["service"]]->getId();
            $data["lit"] = 0;
            
            $tableauPatient = new TableauPatient;
            $retourApi = $tableauPatient->PostPatient($data);
            
            $retourApi = json_decode($retourApi,true);
            dump($retourApi);
            
            if ($retourApi["@context"] != "\/api\/contexts\/Error")
            {

                return $this->redirectToRoute('ajout_lit_a_patient', array('idPatient' => $retourApi["id"], 'idService' => $retourApi["service"]));
            }
            
            
            
        }

        return $this->render('ajout_patient/index.html.twig', [
            'controller_name' => 'AjoutPatientController',
             'formPatient' => $form->createView(),
        ]);
    }
}
