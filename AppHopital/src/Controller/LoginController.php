<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Service\TableauAdmin;
use App\Service\TableauInfirmier;
use phpDocumentor\Reflection\Types\True_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/', name: 'login')]
    public function index(Request $request): Response
    {

        $form = $this->createFormBuilder()
            ->add('identifiant')
            ->add('mdp')
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $request->request->get('form');

            $admins = new TableauAdmin;
            $idAdmin = $admins->AdminParIndentifiant($data['identifiant']);
            if ($idAdmin == true){
                $mdpAdmin = $idAdmin[0]->getMdp();
                $mdpForm = $data['mdp'];
                if ($mdpAdmin == $mdpForm){
                    return $this->redirectToRoute('accueil_administrateur');
                }else{
                    dump("Les mdp ne correspondent pas");
                }
            }else{
                $infirmier = new TableauInfirmier();
                $idAdmin = $admins->AdminParIndentifiant($data['identifiant']);
            }
        }

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'formLogin' => $form->createView(),
        ]);
    }
}
