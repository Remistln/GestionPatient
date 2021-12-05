<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Service\TableauAdmin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AjoutAdminController extends AbstractController
{
    #[Route('/ajout/admin', name: 'ajout_admin')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            $admin = new Admin();
            $adminGet = new TableauAdmin;
            $entiteesAdmin = $adminGet->GetAdmins();
            dump($entiteesAdmin);

            $form = $this->createFormBuilder($admin)
                ->add('nom')
                ->add('prenom')
                ->add('identifiant')
                ->add('mdp')
                ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $data = $request->request->get('form');
                dump($data);
                $donneesAdmin = json_encode($data, JSON_UNESCAPED_SLASHES, true);
                $requetteAdmin = curl_init('http://localhost:8000/api/admins');

                curl_setopt($requetteAdmin, CURLOPT_POSTFIELDS, $donneesAdmin);
                curl_setopt($requetteAdmin, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                curl_setopt($requetteAdmin, CURLOPT_RETURNTRANSFER, true);
                dump($requetteAdmin);
                $retourApi = curl_exec($requetteAdmin);
                curl_close($requetteAdmin);
            }


            return $this->render('ajout_admin/index.html.twig', [
                'controller_name' => 'AjoutAdminController',
                'formAdmin' => $form->createView(),
            ]);
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'AjoutAdminController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}