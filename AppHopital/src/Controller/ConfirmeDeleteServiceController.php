<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteServiceController extends AbstractController
{
    #[Route('/confirme/delete/service/{id}', name: 'confirme_delete_service')]
    public function index($id): Response
    {
        $route = "/delete/service/" . $id;
        return $this->render('confirme_delete_service/index.html.twig', [
            'controller_name' => 'ConfirmeDeleteServiceController',
            'route' => $route
        ]);
    }
}
