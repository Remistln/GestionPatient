<?php

namespace App\Service;

use App\Entity\Patient;


class TableauPatient
{
    public function GetPatients()
    {
        $appel = file_get_contents("http://localhost:8000/api/patients");
        $appel = json_decode($appel,true);

        $tableau = [];
        $patients = $appel["hydra:member"];
        
        foreach($patients as $patientTableau)
        {
            $temps = $patientTableau['dateNaissance'];
            $temps = substr($temps, 0, 10);
            $date = \DateTime::createFromFormat("Y-m-d", $temps);
            
            $lit = $patientTableau['lit'];
            $lit = substr($lit,-1,1);
            $lit = intval($lit);
            
            $service = $patientTableau['service'];
            $service = intval($service['id']);

            $patient = (new Patient())
                ->setId($patientTableau['id'])
                ->setNom($patientTableau['nom'])
                ->setPrenom($patientTableau['prenom'])
                ->setDateNaissance($date)
                ->setLieuNaissance($patientTableau['lieuNaissance'])
                ->setDescription($patientTableau['description'])
                ->setLit($lit)
                ->setNumeroSS($patientTableau['numeroSS'])
                ->setProbleme($patientTableau['probleme'])
                ->setService($service)
                ;
            array_push($tableau, $patient);
        }
        
        return $tableau;
    }
}