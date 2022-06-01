<?php

namespace App\Service;

use App\Entity\Admin;


class TableauAdmin
{
    public function GetAdmins()
    {
        $appel = file_get_contents("http://192.168.42.96:8000/api/admins");
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

    public function GetAdmin($id)
    {
        $appel = file_get_contents("http://192.168.42.96:8000/api/admins/" . strval($id));
        $appel = json_decode($appel, true);

        $admins = $appel;
        
        $admin = (new Admin())
            ->setId($admins['id'])
            ->setNom($admins['nom'])
            ->setPrenom($admins['prenom'])
            ->setIdentifiant($admins['identifiant'])
            ->setMdp($admins['mdp'])
            ;

        
        
        return $admin;
    }

    public function AdminParIndentifiant($identifiant)
    {
        $Admins = $this->GetAdmins();

        $adminTrouves = [];

        foreach($Admins as $admin)
        {
            if ($admin->getIdentifiant() == $identifiant)
            {
                array_push($adminTrouves,$admin);
            }
        }

        return $adminTrouves;
    }

    public function PostAdmin($data)
    {
        
        $donneeAdmin = json_encode($data,true);

        $requetteAdmin = curl_init('http://192.168.42.96:8000/api/admins');

        curl_setopt($requetteAdmin, CURLOPT_POSTFIELDS, $donneeAdmin);
        curl_setopt($requetteAdmin, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requetteAdmin, CURLOPT_RETURNTRANSFER, true);

        $retourApi = curl_exec($requetteAdmin);
        curl_close($requetteAdmin);
        
        return $retourApi;
    }

    public function PutAdmin($idAdmin,$data)
    {
        $donneesAdmin = json_encode($data, JSON_UNESCAPED_SLASHES, true);

            
        $requetteAdmin = curl_init('http://192.168.42.96:8000/api/admins/' . strval($idAdmin));

        curl_setopt($requetteAdmin, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($requetteAdmin, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($requetteAdmin, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requetteAdmin, CURLOPT_POSTFIELDS, $donneesAdmin);
            
        $retourApi = curl_exec($requetteAdmin);
        curl_close($requetteAdmin);
        return $retourApi;
    }

    public function DeleteAdmin($idAdmin)
    {
    
        $requetteAdmin = curl_init('http://192.168.42.96:8000/api/admins/' . strval($idAdmin));
        curl_setopt($requetteAdmin, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($requetteAdmin, CURLOPT_RETURNTRANSFER, true);
    
        $retourApi = curl_exec($requetteAdmin);
    
        curl_close($requetteAdmin);

        return $retourApi;
    }
}