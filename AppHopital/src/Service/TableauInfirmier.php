<?php

namespace App\Service;

use App\Entity\Infirmier;


class TableauInfirmier
{
    public function GetInfirmiers()
    {
        $appel = file_get_contents("http://localhost:8000/api/infirmiers");
        $appel = json_decode($appel, true);
        $tableau = [];

        $infirmiers = $appel["hydra:member"];

        foreach($infirmiers as $infirmierTableau)
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

    public function GetInfirmier($id)
    {
        $appel = file_get_contents("http://localhost:8000/api/infirmiers/" . strval($id));
        $appel = json_decode($appel, true);

        $infirmiers = $appel;

        
        $infirmier = (new Infirmier())
            ->setId($infirmiers['id'])
            ->setNom($infirmiers['nom'])
            ->setPrenom($infirmiers['prenom'])
            ->setIdentifiant($infirmiers['identifiant'])
            ->setMdp($infirmiers['mdp'])
            ;
        
        
        return $infirmiers;
    }
}