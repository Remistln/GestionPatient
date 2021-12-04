<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Lit;
use App\Service\TableauLit;
use App\Service\TableauPatient;

class AjoutLitAPatientController extends AbstractController
{
    #[Route('/ajout/patient/lit', name: 'ajout_lit_a_patient')]
    public function index(Request $request): Response
    {

        $idPatient = $_GET['idPatient'];
        $idService = $_GET['idService'];
        
        $patientGet = new TableauPatient;
        $patient = $patientGet->GetPatient($idPatient);
        

        $litGet = new TableauLit;
        $entiteesLit = $litGet->GetLits();


        $listeLitDuService = array();

        foreach ($entiteesLit as $lit) {
            if ($lit->getService() == $idService && $lit->getEtat())
            {
                array_push($listeLitDuService, $lit);
            }
        }
        dump($listeLitDuService);

        
        $form = $this->createFormBuilder()
                            ->add('lit', ChoiceType::class, [
                                'mapped' => false,
                                'choices'  => $listeLitDuService,
                                'choice_label' => function($lit) {return $lit->__toString();}
                                ]
                            )
                            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $data = $request->request->get('form');
            
            $data["lit"] = $listeLitDuService[$data["lit"]]->getId();
            dump($data);

            $retourApi = $patientGet->PutPatient($idPatient,$data);
        }
        
        return $this->render('ajout_lit_a_patient/index.html.twig', [
            'controller_name' => 'AjoutLitAPatientController',
            'formLit' => $form->createView(),
        ]);
    }
}
