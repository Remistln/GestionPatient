<?php

namespace App\Controller;

use App\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class AjoutPatientController extends AbstractController
{
    #[Route('/ajout/patient', name: 'ajout_patient')]
    public function index(): Response
    {
        $patient = new Patient();
        
        $form = $this->createFormBuilder($patient)
                    ->setAction("http://localhost:8080/post/patient")
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


        return $this->render('ajout_patient/index.html.twig', [
            'controller_name' => 'AjoutPatientController',
             'formPatient' => $form->createView(),
        ]);
    }
}
