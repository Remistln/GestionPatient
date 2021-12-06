<?php

namespace App\Controller;

use App\Entity\Infirmier;
use App\Service\TableauInfirmier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjoutInfirmierController extends AbstractController
{
    #[Route('/ajout/infirmier', name: 'ajout_infirmier')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){

            $infirmier = new Infirmier();
            $infirmierGet = new TableauInfirmier();
            $entiteesInfirmier = $infirmierGet->GetInfirmiers();
            dump($entiteesInfirmier);

            $form = $this->createFormBuilder($infirmier)
                ->add('nom')
                ->add('prenom')
                ->add('identifiant')
                ->add('mdp')
                ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $data = $request->request->get('form');
                dump($data);
                $donneesInfirmier = json_encode($data, JSON_UNESCAPED_SLASHES, true);
                $requestInfirmier = curl_init('http://localhost:8000/api/infirmiers');

                curl_setopt($requestInfirmier, CURLOPT_POSTFIELDS, $donneesInfirmier);
                curl_setopt($requestInfirmier, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                curl_setopt($requestInfirmier, CURLOPT_RETURNTRANSFER, true);
                dump($requestInfirmier);
                $retourApi = curl_exec($requestInfirmier);
                curl_close($requestInfirmier);
                return $this->redirectToRoute('accueil_administrateur');
            }


            return $this->render('ajout_infirmier/index.html.twig', [
                'controller_name' => 'AjoutInfirmierController',
                'formInfirmier' => $form->createView(),
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'AjoutInfirmierController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
