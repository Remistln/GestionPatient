<?php

namespace App\Controller;

use App\Entity\Lit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class AjoutLitController extends AbstractController
{
    #[Route('/ajout/lit', name: 'ajout_lit')]
    public function index(Request $request): Response
    {
        $lit = new Lit();

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

        }
        dump($lit);

        return $this->render('ajout_lit/index.html.twig', [
            'controller_name' => 'AjoutLitController',
            'formLit'=> $form->createView(),
        ]);
    }
}
