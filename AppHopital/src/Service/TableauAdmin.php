<?php

namespace App\Service;

use App\Entity\Admin;


class TableauAdmin
{
    public function GetAdmins()
    {
        $appel = file_get_contents("http://localhost:8000/api/admins");
        $appel = json_decode($appel, true);
        $tableau = [];
        $admins = $appel["hydra:member"];
        foreach($admins as $adminTableau)
        {
            $service = (new Admin())
                ->setId($adminTableau['id'])
                ->setNom($adminTableau['nom'])
                ->setPrenom($adminTableau['prenom'])
                ->setIdentifiant($adminTableau['identifiant'])
                ->setMdp($adminTableau['mdp'])
                ;
            array_push($tableau, $service);
        }
        
        return $tableau;
    }

}