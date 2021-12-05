<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\Infirmier;
use App\Service\TableauAdmin;
use App\Service\TableauInfirmier;
use phpDocumentor\Reflection\Types\True_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\User;

class LoginController extends AbstractController
{
    #[Route('/', name: 'login')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('role', '');

        $form = $this->createFormBuilder()
            ->add('identifiant')
            ->add('mdp')
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $data = $request->request->get('form');

            $admins = new TableauAdmin;
            $Admin = $admins->AdminParIndentifiant($data['identifiant']);
            if ($Admin == true){
                $mdpAdmin = $Admin[0]->getMdp();
                $mdpForm = $data['mdp'];
                if ($mdpAdmin == $mdpForm){
                    $user = new Admin();
                    $session->set('role', $user->getRoles());;
                    return $this->redirectToRoute('accueil_administrateur');
                }else{
                    dump("Les mdp ne correspondent pas");
                }
            }else{
                $infirmier = new TableauInfirmier();
                $Infirmier = $infirmier->InfirmerParIndentifiant($data['identifiant']);
                if ($Infirmier == true) {
                    $mdpInfirmier = $Infirmier[0]->getMdp();
                    $mdpForm = $data['mdp'];
                    if ($mdpInfirmier == $mdpForm) {
                        $user = new Infirmier();
                        $session->set('role', $user->getRoles());;
                        return $this->redirectToRoute('accueil_infirmier');
                    } else {
                        dump("Les mdp de l'utilisateur ne correspondent pas");
                    }
                }else{
                    dump("L'identifiant ne correspond pas");
                }
            }
        }

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'formLogin' => $form->createView(),
        ]);
    }
}
