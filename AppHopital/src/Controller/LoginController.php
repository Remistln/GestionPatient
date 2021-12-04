<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Service\TableauAdmin;
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
                    dump("Les mdp correspondemt ! Bravo");
                }else{
                    dump("Les mdp ne correspondent pas");
                }
            }else{
                dump("Il n'y a pas d'admin avec cet identifiant");
            }
        }

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'formLogin' => $form->createView(),
        ]);
    }
}
