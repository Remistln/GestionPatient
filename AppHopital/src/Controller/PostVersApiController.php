<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PostVersApiController extends AbstractController
{
    #[Route('/post/patient', name: 'post_patient')]
    public function PostPatient(Request $request)
    {
        $donneesPatient = json_encode($request->getContent(), true);
        dump($donneesPatient);
        dump($request->getContent());
        $requettePatient = curl_init('http://localhost:8000/api/patients');

        curl_setopt($requettePatient, CURLOPT_POSTFIELDS, $donneesPatient);
        curl_setopt($requettePatient, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requettePatient, CURLOPT_RETURNTRANSFER, true);

        $retourApi = curl_exec($requettePatient);
        curl_close($requettePatient);

        if ($retourApi == 200) {
            $response = new Response();
            $response = $this->forward('App\Controller\AccueilInfirmierController::accueil_infirmier', [
        ]);
        }
        return $this->render('post_vers_api/index.html.twig', [
            'controller_name' => 'PostVersApiControllerController',
            'title'=> 'Accueil', 'request' => $request->getContent()
        ]);

    }
}
