<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Service\TableauLit;

class AjoutLitAPatientController extends AbstractController
{
    #[Route('/ajout/patient/lit', name: 'ajout_lit_a_patient')]
    public function index(Request $request): Response
    {

        $Patient = $request->request->get("Patient");
        dump($Patient);
        $litGet = new TableauLit;
        $entiteesLit = $litGet->GetLits();

        $listeLitDuService = array();

        foreach ($entiteesLit as $lit) {
            if ($lit->getService() == $Patient['service'])
            {
                array_push($listeLitDuService, $lit->getId());
            }
        }
        dump($listeLitDuService);

        /*
        $form = $this->createFormBuilder()
                            ->add('service', ChoiceType::class, [
                                'mapped' => false,
                                'choices'  => $entiteesLit,
                                'choice_label' => 'label'
                            ]
                            );
        */
        return $this->render('ajout_lit_a_patient/index.html.twig', [
            'controller_name' => 'AjoutLitAPatientController',
        ]);
    }
}
