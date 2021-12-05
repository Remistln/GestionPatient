<?php

namespace App\Controller;

use App\Service\TableauAdmin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteAdminController extends AbstractController
{
    #[Route('/delete/admin/{id}', name: 'delete_admin')]
    public function index(Request $request, $id)
    {
        $session = $request->getSession();
        $role = $session->get('role');
        if ($role == 'ROLE_ADMIN'){
            $manager = new TableauAdmin;
            $appelApi = $manager->DeleteAdmin($id);
            return $this->redirectToRoute('login');
        }else{
            return $this->render('access_denied/index.html.twig', [
                'controller_name' => 'DeleteAdminController',
                'error' => "Vous n'êtes pas autorisé à aller sur cette page"
            ]);
        }
    }
}
