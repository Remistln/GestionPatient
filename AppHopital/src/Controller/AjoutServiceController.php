<?php

namespace App\Controller;

use App\Entity\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class AjoutServiceController extends AbstractController
{
    #[Route('/ajout/service', name: 'ajout_service')]
    public function index(Request $request): Response
    {
        $service = new Service();

        $form= $this->createFormBuilder($service)
                    ->add('label')

                    ->getForm();

                    
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $data = $request->request->get('form');
            $donneeService = json_encode($data,true);

            $requetteService = curl_init('http://localhost:8000/api/services');

            curl_setopt($requetteService, CURLOPT_POSTFIELDS, $donneeService);
            curl_setopt($requetteService, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($requetteService, CURLOPT_RETURNTRANSFER, true);

            $retourApi = curl_exec($requetteService);
            curl_close($requetteService);
        }
        dump($service);

        return $this->render('ajout_service/index.html.twig', [
            'controller_name' => 'AjoutServiceController',
            'formService' => $form->createView(),
        ]);
    }
}
