<?php

namespace App\Service;

use App\Entity\Lit;


class TableauLit
{
    public function GetLits()
    {
        $appel = file_get_contents("http://localhost:8000/api/lits");
        $appel = json_decode($appel, true);

        $tableau = [];
        $lits = $appel["hydra:member"];

        foreach($lits as $litTableau)
        {
            $lit = (new Lit())
                ->setId($litTableau['id'])
                ->setLargeur($litTableau['largeur'])
                ->setLongueur($litTableau['longueur'])
                ->setNumero($litTableau['numero'])
                ->setChambre($litTableau['chambre'])
                ->setEtat($litTableau['etat'])
                ->setService($litTableau['service'])
                ;
            array_push($tableau, $lit);
        }
        
        return $tableau;
    }

    public function GetLit($id)
    {
        $appel = file_get_contents("http://localhost:8000/api/lits/" . strval($id));
        $appel = json_decode($appel, true);

        $lits = $appel;

        $lit = (new Lit())
            ->setId($lits['id'])
            ->setLargeur($lits['largeur'])
            ->setLongueur($lits['longueur'])
            ->setNumero($lits['numero'])
            ->setChambre($lits['chambre'])
            ->setEtat($lits['etat'])
            ->setService($lits['service'])
            ;
        
        return $lit;
    }
}