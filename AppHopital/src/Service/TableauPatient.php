<?php

namespace App\Service;

use App\Entity\Patient;


class TableauPatient
{
    public function GetPatients()
    {
        $appel = file_get_contents("http://localhost:8000/api/patients");
        $appel = json_decode($appel);
        dump($appel);
        $tableau = [];
        foreach($appel as $patientTableau)
        {
            $patient = (new Patient())
                ->setId($patientTableau['id'])
                ->setNom($patientTableau['nom'])
                ->setPrenom($patientTableau['prenom'])
                ->setDateNaissance($patientTableau['dateNaissance'])
                ->setLieuNaissance($patientTableau['lieuNaissance'])
                ->setDescription($patientTableau['description'])
                ->setLit($patientTableau['lit'])
                ->setNumeroSS($patientTableau['numeroSS'])
                ->setProbleme($patientTableau['probleme'])
                ->setService($patientTableau['service'])
                ;
            array_push($tableau, $patient);
        }
        
        return $tableau;
    }
}