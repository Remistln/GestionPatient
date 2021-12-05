<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteInfirmierController extends AbstractController
{
    #[Route('/confirme/delete/infirmier/{id}', name: 'confirme_delete_infirmier')]
    public function index($id): Response
    {
        $route = "/delete/infirmier/" . $id;
        return $this->render('confirme_delete_infirmier/index.html.twig', [
            'controller_name' => 'ConfirmeDeleteInfirmierController',
            'route' => $route
        ]);
    }
}
