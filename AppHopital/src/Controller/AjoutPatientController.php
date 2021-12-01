<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Service;
use App\Service\TableauService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AjoutPatientController extends AbstractController
{
    #[Route('/ajout/patient', name: 'ajout_patient')]
    public function index(Request $request): Response
    {
        $patient = new Patient();

        $serviceGet = new TableauService;
        $entiteesService = $serviceGet->GetServices();
        
        

        dump($entiteesService);
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
            dump($data);
            $data["dateNaissance"] = $data["dateNaissance"]["year"] . '-' . $data["dateNaissance"]["month"] . '-' . $data["dateNaissance"]["day"] ;
            $data["numeroSS"] = intval($data["numeroSS"]);

            $data["service"] = $entiteesService[$data["service"]]->getId();

            $donneesPatient = json_encode($data, JSON_UNESCAPED_SLASHES, true);

            
            $requettePatient = curl_init('http://localhost:8000/api/patients');

            curl_setopt($requettePatient, CURLOPT_POSTFIELDS, $donneesPatient);
            curl_setopt($requettePatient, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($requettePatient, CURLOPT_RETURNTRANSFER, true);
            dump($requettePatient);
            $retourApi = curl_exec($requettePatient);
            curl_close($requettePatient);
            
        }

        return $this->render('ajout_patient/index.html.twig', [
            'controller_name' => 'AjoutPatientController',
             'formPatient' => $form->createView(),
        ]);
    }
}
