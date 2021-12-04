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

    public function InfirmerParIndentifiant($identifiant)
    {
        $Infirmiers = $this->GetInfirmiers();

        $infirmiersTrouves = [];

        foreach($Infirmiers as $infirmier)
        {
            if ($infirmier->getIdentifiant() == $identifiant)
            {
                array_push($infirmiersTrouves,$infirmier);
            }
        }

        return $infirmiersTrouves;
    }

    public function PostInfirmier($data)
    {
        
        $donneeInfirmier = json_encode($data,true);

        $requetteInfirmier = curl_init('http://localhost:8000/api/infirmiers');

        curl_setopt($requetteInfirmier, CURLOPT_POSTFIELDS, $donneeInfirmier);
        curl_setopt($requetteInfirmier, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requetteInfirmier, CURLOPT_RETURNTRANSFER, true);

        $retourApi = curl_exec($requetteInfirmier);
        curl_close($requetteInfirmier);
        
        return $retourApi;
    }

    public function PutInfirmier($idInfirmier,$data)
    {
        $donneesInfirmier = json_encode($data, JSON_UNESCAPED_SLASHES, true);

            
        $requetteInfirmier = curl_init('http://localhost:8000/api/infirmiers/' . strval($idInfirmier));

        curl_setopt($requetteInfirmier, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($requetteInfirmier, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($requetteInfirmier, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requetteInfirmier, CURLOPT_POSTFIELDS, $donneesInfirmier);
            
        $retourApi = curl_exec($requetteInfirmier);
        curl_close($requetteInfirmier);
        return $retourApi;
    }

    
    public function DeleteInfirmier($idInfirmier)
    {
    
        $requetteInfirmier = curl_init('http://localhost:8000/api/infirmiers/' . strval($idInfirmier));
        curl_setopt($requetteInfirmier, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($requetteInfirmier, CURLOPT_RETURNTRANSFER, true);
    
        $retourApi = curl_exec($requetteInfirmier);
    
        curl_close($requetteInfirmier);

        return $retourApi;
    }
    
}