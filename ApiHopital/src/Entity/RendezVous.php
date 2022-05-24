<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 * @ApiResource(
 * normalizationContext={
 * "skip_null_values" = false,
 *  "groups"={"rdv_read"}
 * })
 */

#[ApiFilter(SearchFilter::class, properties: ['Date' => 'exact'])]
class RendezVous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"rdv_read"})
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Vaccin::class, cascade={"persist", "remove"})
     * @Groups({"rdv_read"})
     */
    private $vaccin;

    /**
     * @ORM\Column(type="date")
     * @Groups({"rdv_read"})
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"rdv_read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"rdv_read"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="time")
     * @Groups({"rdv_read"})
     */
    private $heure;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }
}
