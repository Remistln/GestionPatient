<?php

namespace App\Service;

use App\Entity\PriseEnCharge;


class TableauPriseEnCharge
{
    public function GetPriseEnCharges()
    {
        $appel = file_get_contents("http://localhost:8000/api/prise_en_charges");
        $appel = json_decode($appel,true);
        $tableau = [];
        $priseEnCharge = $appel["hydra:member"];
        foreach($priseEnCharge as $priseEnChargeTableau)
        {
            $priseEnCharge = (new PriseEnCharge())
                ->setId($priseEnChargeTableau['id'])
                ->setIdPatient($priseEnChargeTableau['idPatient'])
                ->setIdInfirmier($priseEnChargeTableau['idInfirmier'])
                ;
            array_push($tableau, $priseEnCharge);
        }
        
        return $tableau;
    }

    public function GetPriseEnCharge($id)
    {
        $appel = file_get_contents("http://localhost:8000/api/prise_en_charges/" . strval($id));
        $appel = json_decode($appel,true);
        
        $priseEnCharges = $appel;
        
        $priseEnCharge = (new PriseEnCharge())
            ->setId($priseEnCharges['id'])
            ->setIdPatient($priseEnCharges['idPatient'])
            ->setIdInfirmier($priseEnCharges['idInfirmier'])
            ;
        
        
        
        return $priseEnCharge;
    }

    public function PostPriseEnCharge($data)
    {
        
        $donneePriseEnCharges = json_encode($data,true);

        $requettePriseEnCharges = curl_init('http://localhost:8000/api/prise_en_charges');

        curl_setopt($requettePriseEnCharges, CURLOPT_POSTFIELDS, $donneePriseEnCharges);
        curl_setopt($requettePriseEnCharges, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requettePriseEnCharges, CURLOPT_RETURNTRANSFER, true);

        $retourApi = curl_exec($requettePriseEnCharges);
        curl_close($requettePriseEnCharges);

        return $retourApi;
    }

    public function PutPriseEnCharge($idPriseEnCharges,$data)
    {
        $donneesPriseEnCharges = json_encode($data, JSON_UNESCAPED_SLASHES, true);

            
        $requettePriseEnCharges = curl_init('http://localhost:8000/api/prise_en_charges/' . strval($idPriseEnCharges));

        curl_setopt($requettePriseEnCharges, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($requettePriseEnCharges, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($requettePriseEnCharges, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requettePriseEnCharges, CURLOPT_POSTFIELDS, $donneesPriseEnCharges);
            
        $retourApi = curl_exec($requettePriseEnCharges);
        curl_close($requettePriseEnCharges);
        return $retourApi;
    }

    public function DeletePriseEnCharge($idPriseEnCharges)
    {
    
        $requettePriseEnCharges = curl_init('http://localhost:8000/api/prise_en_charges/' . strval($idPriseEnCharges));
        curl_setopt($requettePriseEnCharges, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($requettePriseEnCharges, CURLOPT_RETURNTRANSFER, true);
    
        $retourApi = curl_exec($requettePriseEnCharges);
    
        curl_close($requettePriseEnCharges);

        return $retourApi;
    }
}