<?php

namespace App\Service;

use App\Entity\Admin;


class TableauAdmin
{
    public function GetAdmin()
    {
        $appel = file_get_contents("api_get");
        $appel = json_decode($appel);
        $tableau = [];
        foreach($appel as $adminTableau)
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