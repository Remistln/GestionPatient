<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Patient;
use App\Entity\Service;
use App\Service\TableauService;
use App\Service\TableauPatient;

class ModificationPatientController extends AbstractController
{
    #[Route('/modification/patient/{id}', name: 'modification_patient')]
    public function index(int $id,Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $managerPatient = new TableauPatient();
            $patient = $managerPatient->GetPatient($id);

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

                $tableauPatient = new TableauPatient;
                $retourApi = $tableauPatient->PutPatient($id,$data);
                if ($role == 'ROLE_ADMIN'){
                    return $this->redirectToRoute('accueil_administrateur');
                }else{
                    return $this->redirectToRoute('accueil_infirmier');
                }
            }

            return $this->render('modification_patient/index.html.twig', [
                'controller_name' => 'ModificationPatientController',
                'formPatient' => $form->createView(),
                'role' => $role
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'ModificationLitController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }

    }

    
}
