<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Infirmier;
use App\Entity\Lit;
use App\Entity\Patient;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use phpDocumentor\Reflection\PseudoTypes\LiteralString;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $admin = new Admin();
            $admin->setNom($faker->name());
            $admin->setPrenom($faker->firstName());
            $admin->setIdentifiant($faker->email());
            $admin->setMdp($faker->password());
            $manager->persist($admin);

            $infirmier = new Infirmier();
            $infirmier->setNom($faker->name());
            $infirmier->setPrenom($faker->firstName());
            $infirmier->setIdentifiant($faker->email());
            $infirmier->setMdp($faker->password());
            $manager->persist($infirmier);

            $service = new Service();
            $service->setLabel($faker->text());
            $manager->persist($service);
            $manager->flush();

            if ($service->getId() == null)
            {
                echo $service->getId();
            }
            else
            {
                echo $service->getId();
                $lit = new Lit();
                $lit->setChambre($faker->randomDigit());
                $lit->setEtat($faker->boolean());
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
            


        }

        $manager->flush();
    }
}
