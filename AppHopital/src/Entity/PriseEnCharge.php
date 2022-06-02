<?php

namespace App\Entity;

use App\Repository\PriseEnChargeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PriseEnChargeRepository::class)
 */
class PriseEnCharge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idPatient;

    /**
     * @ORM\Column(type="integer")
     */
    private $idInfirmier;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getIdPatient(): ?int
    {
        return $this->idPatient;
    }

    public function setIdPatient(int $idPatient): self
    {
        $this->idPatient = $idPatient;

        return $this;
    }

    public function getIdInfirmier(): ?int
    {
        return $this->idInfirmier;
    }

    public function setIdInfirmier(int $idInfirmier): self
    {
        $this->idInfirmier = $idInfirmier;

        return $this;
    }
}
