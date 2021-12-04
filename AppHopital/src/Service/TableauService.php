<?php

namespace App\Service;

use App\Entity\Service;


class TableauService
{
    public function GetServices()
    {
        $appel = file_get_contents("http://localhost:8000/api/services");
        $appel = json_decode($appel,true);
        $tableau = [];
        $service = $appel["hydra:member"];
        foreach($service as $serviceTableau)
        {
            $service = (new Service())
                ->setId($serviceTableau['id'])
                ->setLabel($serviceTableau['label'])
                ;
            array_push($tableau, $service);
        }
        
        return $tableau;
    }

    public function GetService($id)
    {
        $appel = file_get_contents("http://localhost:8000/api/services/" . strval($id));
        $appel = json_decode($appel,true);
        
        $services = $appel;
        
        $service = (new Service())
            ->setId($services['id'])
            ->setLabel($services['label'])
            ;
        
        
        
        return $service;
    }

    public function PostService($data)
    {
        
        $donneeService = json_encode($data,true);

        $requetteService = curl_init('http://localhost:8000/api/services');

        curl_setopt($requetteService, CURLOPT_POSTFIELDS, $donneeService);
        curl_setopt($requetteService, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requetteService, CURLOPT_RETURNTRANSFER, true);

        $retourApi = curl_exec($requetteService);
        curl_close($requetteService);
        
        return $retourApi;
    }
}