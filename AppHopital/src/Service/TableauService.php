<?php

namespace App\Service;

use App\Entity\Service;


class TableauService
{
    public function GetServices()
    {
        $appel = file_get_contents("api_get");
        $appel = json_decode($appel);
        $tableau = [];
        foreach($appel as $serviceTableau)
        {
            $service = (new Service())
                ->setId($serviceTableau['id'])
                ->setLabel($serviceTableau['label'])
                ;
            array_push($tableau, $service);
        }
        
        return $tableau;
    }
}