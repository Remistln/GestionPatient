<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteLitController extends AbstractController
{
    #[Route('/confirme/delete/lit/{id}', name: 'confirme_delete_lit')]
    public function index($id): Response
    {
        $route = "/delete/lit/" . $id;
        return $this->render('confirme_delete_lit/index.html.twig', [
            'controller_name' => 'ConfirmeDeleteLitController',
            'route' => $route
        ]);
    }
}
