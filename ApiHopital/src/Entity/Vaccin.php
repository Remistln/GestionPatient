<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VaccinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VaccinRepository::class)
 */
#[ApiResource]
class Vaccin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datePeremption;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reserve;

    /**
     * @ORM\OneToMany(targetEntity=TypeVaccin::class, mappedBy="vaccin")
     */
    private $type;

    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePeremption(): ?\DateTimeInterface
    {
        return $this->datePeremption;
    }

    public function setDatePeremption(\DateTimeInterface $datePeremption): self
    {
        $this->datePeremption = $datePeremption;

        return $this;
    }

    public function getReserve(): ?bool
    {
        return $this->reserve;
    }

    public function setReserve(bool $reserve): self
    {
        $this->reserve = $reserve;

        return $this;
    }

    /**
     * @return Collection|TypeVaccin[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(TypeVaccin $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
            $type->setVaccin($this);
        }

        return $this;
    }

    public function removeType(TypeVaccin $type): self
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getVaccin() === $this) {
                $type->setVaccin(null);
            }
        }

        return $this;
    }
}
