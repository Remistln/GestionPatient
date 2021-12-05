<?php

namespace App\Controller;

use App\Service\TableauAdmin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAdminController extends AbstractController
{
    #[Route('/delete/admin/{id}', name: 'delete_admin')]
    public function index($id)
    {
        $manager = new TableauAdmin;
        $appelApi = $manager->DeleteAdmin($id);

        
        return $this->redirectToRoute('login');
        

    }
}
