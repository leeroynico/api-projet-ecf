<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OfficineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OfficineRepository::class)
 */
class Officine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=ChambreFroide::class, mappedBy="officine")
     */
    private $chambreFroides;

    /**
     * @ORM\Column(type="string", length=100, nullable=true, unique="true")
     */
    private $custom_identifiant;

    public function __construct()
    {
        $this->chambreFroides = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|ChambreFroide[]
     */
    public function getChambreFroides(): Collection
    {
        return $this->chambreFroides;
    }

    public function addChambreFroide(ChambreFroide $chambreFroide): self
    {
        if (!$this->chambreFroides->contains($chambreFroide)) {
            $this->chambreFroides[] = $chambreFroide;
            $chambreFroide->setOfficine($this);
        }

        return $this;
    }

    public function removeChambreFroide(ChambreFroide $chambreFroide): self
    {
        if ($this->chambreFroides->removeElement($chambreFroide)) {
            // set the owning side to null (unless already changed)
            if ($chambreFroide->getOfficine() === $this) {
                $chambreFroide->setOfficine(null);
            }
        }

        return $this;
    }

    public function getCustomIdentifiant(): ?string
    {
        return $this->custom_identifiant;
    }

    public function setCustomIdentifiant(?string $custom_identifiant): self
    {
        $this->custom_identifiant = $custom_identifiant;

        return $this;
    }
}
