<?php

namespace App\Controller;

use App\Entity\Lit;
use App\Entity\Service;
use App\Service\TableauService;
use App\Service\TableauLit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;

class AjoutLitController extends AbstractController
{
    #[Route('/ajout/lit', name: 'ajout_lit')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $lit = new Lit();

            $serviceGet = new TableauService;
            $entiteesService = $serviceGet->GetServices();

            $form = $this ->createFormBuilder($lit)
                ->add('numero')
                ->add('chambre')
                ->add('service', ChoiceType::class, [
                        'mapped' => false,
                        'choices'  => $entiteesService,
                        'choice_label' => 'label'
                    ]
                )
                ->add('longueur')
                ->add('largeur')
                ->add('etat')

                ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $data = $request->request->get('form');

                $data["numero"] = intval($data["numero"]);
                $data["chambre"] = intval($data["chambre"]);
                $data["longueur"] = floatval($data["longueur"]);
                $data["largeur"] = floatval($data["largeur"]);
                $data["etat"] = boolval($data["etat"]);
                $data["service"] = $entiteesService[$data["service"]]->getId();

                $tableauLit = new TableauLit;
                $retourApi = $tableauLit->PostLit($data);
                return $this->redirectToRoute('accueil_administrateur');
            }


            return $this->render('ajout_lit/index.html.twig', [
                'controller_name' => 'AjoutLitController',
                'formLit'=> $form->createView(),
                'role' => $role
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'AjoutLitController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
