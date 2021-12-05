<?php

namespace App\Controller;

use App\Service\TableauInfirmier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteInfirmierController extends AbstractController
{
    #[Route('/delete/infirmier/{id}', name: 'delete_infirmier')]
    public function index($id)
    {
        $manager = new TableauInfirmier;
        $appelApi = $manager->DeleteInfirmier($id);

        
        return $this->redirectToRoute('login');
        

    }
}
