<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Service\TableauAdmin;
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
            $tableauAdmins = $admins->GetAdmins();
            dump($tableauAdmins);
        }



        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'formLogin' => $form->createView(),
        ]);
    }
}
