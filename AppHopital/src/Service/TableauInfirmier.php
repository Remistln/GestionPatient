<?php

namespace App\Service;

use App\Entity\Infirmier;


class TableauInfirmier
{
    public function GetInfirmier()
    {
        $appel = file_get_contents("api_get");
        $appel = json_decode($appel);
        $tableau = [];
        foreach($appel as $infirmierTableau)
        {
            $service = (new Infirmier())
                ->setId($infirmierTableau['id'])
                ->setNom($infirmierTableau['nom'])
                ->setPrenom($infirmierTableau['prenom'])
                ->setIdentifiant($infirmierTableau['identifiant'])
                ->setMdp($infirmierTableau['mdp'])
                ;
            array_push($tableau, $service);
        }
        
        return $tableau;
    }
}