<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Service;
use App\Service\TableauService;
use App\Service\TableauPatient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
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
                ->add('numeroSS', TextType::class, array('attr' => ['minlength' => 13,'maxlength' => 13]))
                ->add('probleme')
                ->add('description')

                ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid())
            {
                $data = $request->request->get('form');

                $data["dateNaissance"] = $data["dateNaissance"]["year"] . '-' . $data["dateNaissance"]["month"] . '-' . $data["dateNaissance"]["day"] ;

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
                'role' => $role
            ]);

        }else{

            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'AjoutPatientController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);

        }

    }
}
