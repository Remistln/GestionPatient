<?php

namespace App\Controller;

use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class AjoutPatientController extends AbstractController
{
    #[Route('/ajout/patient', name: 'ajout_patient')]
    public function index(Request $request): Response
    {
        $patient = new Patient();
        
        $form = $this->createFormBuilder($patient)
                    ->add('nom')
                    ->add('prenom')
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
            
            
            $donneesPatient = json_encode($data,true);
            
            
            $requettePatient = curl_init('http://localhost:8000/api/patients');

            curl_setopt($requettePatient, CURLOPT_POSTFIELDS, $donneesPatient);
            curl_setopt($requettePatient, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($requettePatient, CURLOPT_RETURNTRANSFER, true);

            $retourApi = curl_exec($requettePatient);
            curl_close($requettePatient);
            
        }

        return $this->render('ajout_patient/index.html.twig', [
            'controller_name' => 'AjoutPatientController',
             'formPatient' => $form->createView(),
        ]);
    }
}
