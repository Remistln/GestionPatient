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
            $data = $request->request->get('form');

            $data["numero"] = intval($data["numero"]);
            $data["chambre"] = intval($data["chambre"]); 
            $data["longueur"] = floatval($data["longueur"]); 
            $data["largeur"] = floatval($data["largeur"]); 
            $data["etat"] = boolval($data["etat"]); 

            $donneesLit = json_encode($data,true);

            $requetteLit = curl_init('http://localhost:8000/api/lits');

            curl_setopt($requetteLit, CURLOPT_POSTFIELDS, $donneesLit);
            curl_setopt($requetteLit, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($requetteLit, CURLOPT_RETURNTRANSFER, true);

            $retourApi = curl_exec($requetteLit);
            curl_close($requetteLit);
        }
 

        return $this->render('ajout_lit/index.html.twig', [
            'controller_name' => 'AjoutLitController',
            'formLit'=> $form->createView(),
        ]);
    }
}
