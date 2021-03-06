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
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
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
                $dataLit = array("etat" => false);

                $retourApiPatient = $patientGet->PutPatient($idPatient,$data);
                $retourApiLit =$litGet->PutLit($data["lit"] , $dataLit);
                if ($role == 'ROLE_ADMIN'){
                    return $this->redirectToRoute('accueil_administrateur');
                }else{
                    return $this->redirectToRoute('accueil_infirmier');
                }
            }

            return $this->render('ajout_lit_a_patient/index.html.twig', [
                'controller_name' => 'AjoutLitAPatientController',
                'formLit' => $form->createView(),
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'AjoutLitAPatientController',
                'error' => "Vous n'??tes pas autoris?? ?? aller sur cette page"
            ]);
        }
    }
}
