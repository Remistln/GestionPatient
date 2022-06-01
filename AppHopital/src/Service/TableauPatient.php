<?php

namespace App\Service;

use App\Entity\Patient;


class TableauPatient
{
    public function GetPatients()
    {
        $appel = file_get_contents("http://192.168.42.96:8000/api/patients");
        $appel = json_decode($appel,true);

        $tableau = [];
        $patients = $appel["hydra:member"];
        
        foreach($patients as $patientTableau)
        {
            $temps = $patientTableau['dateNaissance'];
            $temps = substr($temps, 0, 10);
            $date = \DateTime::createFromFormat("Y-m-d", $temps);
            
            $lit = $patientTableau['lit'];
            #$lit = intval($lit['id']);

            
            $service = $patientTableau['service'];

            #$service = intval($service['id']);

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

    public function GetPatient($id)
    {
        $appel = file_get_contents("http://192.168.42.96:8000/api/patients/" . strval($id));
        $appel = json_decode($appel,true);

        $patientReponse = $appel;

        $temps = $patientReponse['dateNaissance'];
        $temps = substr($temps, 0, 10);
        $date = \DateTime::createFromFormat("Y-m-d", $temps);
            
        $lit = $patientReponse['lit'];

            
        $service = $patientReponse['service'];


        $patient = (new Patient())
            ->setId($patientReponse['id'])
            ->setNom($patientReponse['nom'])
            ->setPrenom($patientReponse['prenom'])
            ->setDateNaissance($date)
            ->setLieuNaissance($patientReponse['lieuNaissance'])
            ->setDescription($patientReponse['description'])
            ->setLit($lit)
            ->setNumeroSS($patientReponse['numeroSS'])
            ->setProbleme($patientReponse['probleme'])
            ->setService($service)
            ;
        return $patient;
    }

    public function PostPatient($data)
    {
        $donneesPatient = json_encode($data, JSON_UNESCAPED_SLASHES, true);

            
        $requettePatient = curl_init('http://192.168.42.96:8000/api/patients');

        curl_setopt($requettePatient, CURLOPT_POSTFIELDS, $donneesPatient);
        curl_setopt($requettePatient, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requettePatient, CURLOPT_RETURNTRANSFER, true);
            
        $retourApi = curl_exec($requettePatient);
        curl_close($requettePatient);
        return $retourApi;
    }

    public function PutPatient($idPatient,$data)
    {
        $donneesPatient = json_encode($data, JSON_UNESCAPED_SLASHES, true);

            
        $requettePatient = curl_init('http://192.168.42.96:8000/api/patients/' . strval($idPatient));

        curl_setopt($requettePatient, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($requettePatient, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($requettePatient, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($requettePatient, CURLOPT_POSTFIELDS, $donneesPatient);
            
        $retourApi = curl_exec($requettePatient);
        curl_close($requettePatient);
        return $retourApi;
    }

    public function DeletePatient($idPatient)
    {
    
        $requettePatient = curl_init('http://192.168.42.96:8000/api/patients/' . strval($idPatient));
        curl_setopt($requettePatient, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($requettePatient, CURLOPT_RETURNTRANSFER, true);
    
        $retourApi = curl_exec($requettePatient);
    
        curl_close($requettePatient);

        return $retourApi;
    }
}