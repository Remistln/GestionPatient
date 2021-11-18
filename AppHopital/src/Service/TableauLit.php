<?php

namespace App\Service;

use App\Entity\Lit;


class TableauLit
{
    public function GetLits()
    {
        $appel = file_get_contents("api_get");
        $appel = json_decode($appel);
        $tableau = [];
        foreach($appel as $litTableau)
        {
            $lit = (new Lit())
                ->setId($litTableau['id'])
                ->setLargeur($litTableau['largeur'])
                ->setLongueur($litTableau['longueur'])
                ->setNumero($litTableau['numero'])
                ->setChambre($litTableau['chambre'])
                ->setEtat($litTableau['etat'])
                ;
            array_push($tableau, $lit);
        }
        
        return $tableau;
    }
}