<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=LitRepository::class)
 */
#[ApiResource]
class Lit
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
     * @ORM\Column(type="integer")
     */
    private $numero;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="integer")
     */
    private $chambre;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="integer")
     */
    private $longueur;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="integer")
     */
    private $largeur;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    #[Groups("patient")]
    /**
     * @ORM\Column(type="integer")
     */
    private $service;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(int $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

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
}
