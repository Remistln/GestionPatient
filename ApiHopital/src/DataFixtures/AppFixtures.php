<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Infirmier;
use App\Entity\Lit;
use App\Entity\Patient;
use App\Entity\RendezVous;
use App\Entity\Secretaire;
use App\Entity\Service;
use App\Entity\TypeVaccin;
use App\Entity\Vaccin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use phpDocumentor\Reflection\PseudoTypes\LiteralString;
use PhpParser\Node\Expr\New_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $list_services = ["Urgences", "Radiologie", "Cardiologie", "Maternité", "Chirurgie", "Medecin general", "Pneumologie", "Covid", "Pharmacie", "Neurologie"];
        $horraires = ["09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30"];
        $faker = Factory::create();

        $pfizer = new TypeVaccin();
        $pfizer->setLabel("Pfizer")
            ->setAgeMin(5)
            ->setAgeMax(20);
        $manager->persist($pfizer);

        $astra = new TypeVaccin();
        $astra->setLabel("AstraZeneca")
            ->setAgeMin(20)
            ->setAgeMax(80);
        $manager->persist($astra);

        $moderna = new TypeVaccin();
        $moderna->setLabel("Moderna")
            ->setAgeMin(30)
            ->setAgeMax(150);
        $manager->persist($moderna);

        $mdpFile = "mdp.txt";
        $mdpData = "Liste des mdps :\n";
        

        for ($i = 0; $i < 10; $i++) {

            $identifiantAdmin = $faker->email();
            $mdpAdmin = $faker->word();
            $mdpData .= "    Administrateur : ". $identifiantAdmin . " mdp : " . $mdpAdmin . "\n";

            $admin = new Admin();
            $admin->setNom($faker->name());
            $admin->setPrenom($faker->firstName());
            $admin->setIdentifiant($identifiantAdmin);
            $admin->setMdp(password_hash($mdpAdmin, PASSWORD_DEFAULT));
            $manager->persist($admin);

            
            $identifiantInfirmier = $faker->email();
            $mdpInfirmier = $faker->word();
            $mdpData .= "    Infirmier : ". $identifiantInfirmier . " mdp : " . $mdpInfirmier . "\n";

            $infirmier = new Infirmier();
            $infirmier->setNom($faker->name());
            $infirmier->setPrenom($faker->firstName());
            $infirmier->setIdentifiant($identifiantInfirmier);
            $infirmier->setMdp(password_hash($mdpInfirmier, PASSWORD_DEFAULT));
            $manager->persist($infirmier);

            $service = new Service();
            $service->setLabel($list_services[$i]);
            $manager->persist($service);
            $manager->flush();

            if ($service->getId() == null) {
                echo $service->getId();
            } else {
                echo $service->getId();
                
                for ($j = 0; $j < 15; $j++)
                {
                    $lit = new Lit();
                    $lit->setChambre($faker->randomDigit());
                    $lit->setEtat(false);
                    $lit->setLargeur($faker->randomDigit());
                    $lit->setLongueur($faker->randomDigit());
                    $lit->setNumero($faker->randomDigit());
                    $lit->setService($service->getId());
                    $manager->persist($lit);
                    $manager->flush();
    
    
                    $patient = new Patient();
                    $patient->setLit($lit->getId());
                    $patient->setService($service->getId());
                    $patient->setNom($faker->name());
                    $patient->setPrenom($faker->firstName());
                    $patient->setDateNaissance($faker->dateTime());
                    $patient->setLieuNaissance($faker->city());
                    $patient->setDescription($faker->text());
                    $patient->setProbleme($faker->text());
                    $patient->setNumeroSS($faker->randomDigit());
                    $manager->persist($patient);
                }
                
                for ($j = 0; $j < 10; $j++)
                {
                    $lit = new Lit();
                    $lit->setChambre($faker->randomDigit());
                    $lit->setEtat($faker->boolean());
                    $lit->setLargeur($faker->randomDigit());
                    $lit->setLongueur($faker->randomDigit());
                    $lit->setNumero($faker->randomDigit());
                    $lit->setService($service->getId());
                    $manager->persist($lit);
    
                }
            }

            $identifiantSecretaire = $faker->email();
            $mdpSecretaire = $faker->word();
            $mdpData .= "    Secretaire : ". $identifiantSecretaire . " mdp : " . $mdpSecretaire . "\n";

            $secretaire = new Secretaire();
            $secretaire->setIdentifiant($identifiantSecretaire)
                ->setMdp(password_hash($mdpSecretaire, PASSWORD_DEFAULT))
                ->setNom($faker->name())
                ->setPrenom($faker->firstName());
            $manager->persist($secretaire);
        }

        for ($i = 0; $i < 10; $i++)
        {
            $type = $pfizer;
            $num = rand(1, 3);
            if ($num == 1) {
                $type = $pfizer;
            } elseif ($num == 2) {
                $type = $astra;
            }elseif ($num == 3) {
                $type = $moderna;
            }
            $vaccin = new Vaccin();
            $vaccin->setReserve(true)
                ->setDatePeremption($faker->dateTimeBetween('+20 day', '+30 day'))
                ->setType($type);
            $manager->persist($vaccin);

            $rdv = new RendezVous();
                //date_format("2012-03-24 17:00:00", 'Y-m-d H:i:s')
            $dateRdv = $faker->dateTimeBetween('+2 day', '+18 day');
            $rdv
                ->setDate($dateRdv)
                ->setHeure(\DateTime::createFromFormat('H:i', $horraires[rand(0, 17)]))
                ->setNom($faker->name())
                ->setPrenom($faker->firstName())
                ->setVaccin($vaccin);
            $manager->persist($rdv);
        }

        for ($i = 0; $i < 25; $i++)
        {
            $type = $pfizer;
            $num = rand(1, 3);
            if ($num == 1) {
                $type = $pfizer;
            } elseif ($num == 2) {
                $type = $astra;
            }elseif ($num == 3) {
                $type = $moderna;
            }
            $vaccin = new Vaccin();
            $vaccin->setReserve(false)
                ->setDatePeremption($faker->dateTimeBetween('+1 day', '+2 day'))
                ->setType($type);
            $manager->persist($vaccin);
        }

        $manager->flush();

        file_put_contents($mdpFile, $mdpData);
    }
}
