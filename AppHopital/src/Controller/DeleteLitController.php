<?php

namespace App\Controller;

use App\Service\TableauLit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteLitController extends AbstractController
{
    #[Route('/delete/lit/{id}', name: 'delete_lit')]
    public function index($id)
    {
        $manager = new TableauLit;
        $appelApi = $manager->DeleteLit($id);

        
        return $this->redirectToRoute('accueil_administrateur');
        

    }
}
