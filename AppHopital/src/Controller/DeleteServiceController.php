<?php

namespace App\Controller;

use App\Service\TableauService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteServiceController extends AbstractController
{
    #[Route('/delete/service/{id}', name: 'delete_service')]
    public function index($id)
    {
        $manager = new TableauService;
        $appelApi = $manager->DeleteService($id);

        
        return $this->redirectToRoute('login');
        

    }
}
