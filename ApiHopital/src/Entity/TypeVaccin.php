<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TypeVaccinRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=TypeVaccinRepository::class)
 * @ApiResource(
 * normalizationContext={
 * "skip_null_values" = false,
 *  "groups"={"vaccintype_read"}
 * })
 */
 #[ApiFilter(SearchFilter::class, properties: ['label' => "exact"])]
class TypeVaccin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"vaccintype_read", "vaccin_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vaccintype_read", "vaccin_read", "rdv_read"})
     */
    private $label;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"vaccintype_read", "vaccin_read", "rdv_read"})
     */
    private $ageMin;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"vaccintype_read", "vaccin_read"})
     */
    private $ageMax;

    /**
     * @ORM\OneToMany(targetEntity=Vaccin::class, mappedBy="type")
     * @Groups({"vaccintype_read"})
     */
    private $vaccins;

    public function __construct()
    {
        $this->vaccins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getAgeMin(): ?int
    {
        return $this->ageMin;
    }

    public function setAgeMin(int $ageMin): self
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    public function getAgeMax(): ?int
    {
        return $this->ageMax;
    }

    public function setAgeMax(int $ageMax): self
    {
        $this->ageMax = $ageMax;

        return $this;
    }

    /**
     * @return Collection<int, Vaccin>
     */
    public function getVaccins(): Collection
    {
        return $this->vaccins;
    }

    public function addVaccin(Vaccin $vaccin): self
    {
        if (!$this->vaccins->contains($vaccin)) {
            $this->vaccins[] = $vaccin;
            $vaccin->setType($this);
        }

        return $this;
    }

    public function removeVaccin(Vaccin $vaccin): self
    {
        if ($this->vaccins->removeElement($vaccin)) {
            // set the owning side to null (unless already changed)
            if ($vaccin->getType() === $this) {
                $vaccin->setType(null);
            }
        }

        return $this;
    }
}