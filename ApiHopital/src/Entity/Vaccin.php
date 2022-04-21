<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\VaccinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=VaccinRepository::class)
 * @ApiResource(
 * normalizationContext={
 * "skip_null_values" = false,
 *  "groups"={"vaccin_read"}
 * })
 */
#[ApiFilter(SearchFilter::class, properties: ['reserve' => 'exact', 'datePeremption' => 'exact', 'type' => 'exact'])]
class Vaccin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"vaccin_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups({"vaccin_read"})
     */
    private $datePeremption;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"vaccin_read"})
     */
    private $reserve;

    /**
     * @ORM\ManyToOne(targetEntity=TypeVaccin::class, inversedBy="vaccins")
     * @Groups({"vaccin_read"})
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

    public function getType(): ?TypeVaccin
    {
        return $this->type;
    }

    public function setType(?TypeVaccin $type): self
    {
        $this->type = $type;

        return $this;
    }
}
