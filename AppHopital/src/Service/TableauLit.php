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

    public function PostLit($data)
    {
        
        $donneeLit = json_encode($data,true);

        $requetteLit = curl_init('http://localhost:8000/api/lits');

        curl_setopt($requetteLit, CURLOPT_POSTFIELDS, $donneeLit);
        curl_setopt($requetteLit, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requetteLit, CURLOPT_RETURNTRANSFER, true);

        $retourApi = curl_exec($requetteLit);
        curl_close($requetteLit);
        
        return $retourApi;
    }

    public function PutLit($idLit,$data)
    {
        $donneesLit = json_encode($data, JSON_UNESCAPED_SLASHES, true);

            
        $requetteLit = curl_init('http://localhost:8000/api/lits/' . strval($idLit));

        curl_setopt($requetteLit, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($requetteLit, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($requetteLit, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requetteLit, CURLOPT_POSTFIELDS, $donneesLit);
            
        $retourApi = curl_exec($requetteLit);
        curl_close($requetteLit);
        return $retourApi;
    }

    public function DeleteLit($idLit)
    {
    
        $requetteLit = curl_init('http://localhost:8000/api/lits/' . strval($idLit));
        curl_setopt($requetteLit, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($requetteLit, CURLOPT_RETURNTRANSFER, true);
    
        $retourApi = curl_exec($requetteLit);
    
        curl_close($requetteLit);

        return $retourApi;
    }
}