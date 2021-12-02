<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
#[ApiResource(normalizationContext: ['groups' => ['patient']],
            denormalizationContext:['groups' => ['patient']]
    )]
class Patient
{
    #[Groups("patient")]
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuNaissance;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $probleme;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="integer")
     */
    private $numeroSS;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="integer")
     */
    private $service;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="integer")
     */
    private $lit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(string $lieuNaissance): self
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

    public function setProbleme(string $probleme): self
    {
        $this->probleme = $probleme;

        return $this;
    }

    public function getNumeroSS(): ?int
    {
        return $this->numeroSS;
    }

    public function setNumeroSS(int $numeroSS): self
    {
        $this->numeroSS = $numeroSS;

        return $this;
    }

    public function getService(): ?int
    {
        return $this->service;
    }

    public function setService(int $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getLit(): ?int
    {
        return $this->lit;
    }

    public function setLit(int $lit): self
    {
        $this->lit = $lit;

        return $this;
    }
}
