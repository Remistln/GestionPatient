<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $probleme;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numeroSS;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $service;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProbleme(): ?string
    {
        return $this->probleme;
    }

    public function setProbleme(?string $probleme): self
    {
        $this->probleme = $probleme;

        return $this;
    }

    public function getNumeroSS(): ?int
    {
        return $this->numeroSS;
    }

    public function setNumeroSS(?int $numeroSS): self
    {
        $this->numeroSS = $numeroSS;

        return $this;
    }

    public function getService(): ?int
    {
        return $this->service;
    }

    public function setService(?int $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getLit(): ?int
    {
        return $this->lit;
    }

    public function setLit(?int $lit): self
    {
        $this->lit = $lit;

        return $this;
    }
}
