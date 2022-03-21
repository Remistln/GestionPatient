<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 */
class RendezVous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Infirmier::class, inversedBy="rendezVous")
     */
    private $infirmier;

    /**
     * @ORM\OneToOne(targetEntity=Vaccin::class, cascade={"persist", "remove"})
     */
    private $vaccin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfirmier(): ?Infirmier
    {
        return $this->infirmier;
    }

    public function setInfirmier(?Infirmier $infirmier): self
    {
        $this->infirmier = $infirmier;

        return $this;
    }

    public function getVaccin(): ?Vaccin
    {
        return $this->vaccin;
    }

    public function setVaccin(?Vaccin $vaccin): self
    {
        $this->vaccin = $vaccin;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
