<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfirmeDeleteAdminController extends AbstractController
{
    #[Route('/confirme/delete/admin/{id}', name: 'confirme_delete_admin')]
    public function index($id): Response
    {
        $route = "/delete/admin/" . $id;
        return $this->render('confirme_delete_admin/index.html.twig', [
            'controller_name' => 'ConfirmeDeleteAdminController',
            'route' => $route
        ]);
    }
}
