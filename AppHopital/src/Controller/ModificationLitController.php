<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Lit;
use App\Service\TableauLit;

class ModificationLitController extends AbstractController
{
    #[Route('/modification/lit/{id}', name: 'modification_lit')]
    public function index($id, Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN' || $role == 'ROLE_USER'){
            $managerLit = new TableauLit;
            $lit = $managerLit->GetLit($id);

            $form = $this ->createFormBuilder($lit)
                ->add('numero')
                ->add('chambre')
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


                $retourApi = $managerLit->PutLit($id, $data);
                if ($role == 'ROLE_ADMIN'){
                    return $this->redirectToRoute('accueil_administrateur');
                }else{
                    return $this->redirectToRoute('accueil_infirmier');
                }

            }
            return $this->render('modification_lit/index.html.twig', [
                'controller_name' => 'ModificationLitController',
                'formLit'=> $form->createView(),
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
