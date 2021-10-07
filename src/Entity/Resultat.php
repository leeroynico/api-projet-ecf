<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ResultatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ResultatRepository::class)
 */
class Resultat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $resultat_temperature = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $resultat_hygrometrie = [];

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $validation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=ChambreFroide::class, inversedBy="resultats")
     */
    private $chambre_froide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getResultatTemperature(): ?array
    {
        return $this->resultat_temperature;
    }

    public function setResultatTemperature(?array $resultat_temperature): self
    {
        $this->resultat_temperature = $resultat_temperature;

        return $this;
    }

    public function getResultatHygrometrie(): ?array
    {
        return $this->resultat_hygrometrie;
    }

    public function setResultatHygrometrie(?array $resultat_hygrometrie): self
    {
        $this->resultat_hygrometrie = $resultat_hygrometrie;

        return $this;
    }

    public function getValidation(): ?bool
    {
        return $this->validation;
    }

    public function setValidation(?bool $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getChambreFroide(): ?ChambreFroide
    {
        return $this->chambre_froide;
    }

    public function setChambreFroide(?ChambreFroide $chambre_froide): self
    {
        $this->chambre_froide = $chambre_froide;

        return $this;
    }
}
