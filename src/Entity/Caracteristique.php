<?php

namespace App\Entity;

use App\Repository\CaracteristiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaracteristiqueRepository::class)
 */
class Caracteristique
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
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $data_type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=OptionArticle::class, mappedBy="caracteristique")
     */
    private $optionArticles;

    /**
     * @ORM\OneToMany(targetEntity=DossierCaracteristique::class, mappedBy="caracteristique")
     */
    private $dossierCaracteristiques;

    public function __construct()
    {
        $this->optionArticles = new ArrayCollection();
        $this->dossierCaracteristiques = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDataType(): ?string
    {
        return $this->data_type;
    }

    public function setDataType(string $data_type): self
    {
        $this->data_type = $data_type;

        return $this;
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

    /**
     * @return Collection|OptionArticle[]
     */
    public function getOptionArticles(): Collection
    {
        return $this->optionArticles;
    }

    public function addOptionArticle(OptionArticle $optionArticle): self
    {
        if (!$this->optionArticles->contains($optionArticle)) {
            $this->optionArticles[] = $optionArticle;
            $optionArticle->setCaracteristique($this);
        }

        return $this;
    }

    public function removeOptionArticle(OptionArticle $optionArticle): self
    {
        if ($this->optionArticles->removeElement($optionArticle)) {
            // set the owning side to null (unless already changed)
            if ($optionArticle->getCaracteristique() === $this) {
                $optionArticle->setCaracteristique(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DossierCaracteristique[]
     */
    public function getDossierCaracteristiques(): Collection
    {
        return $this->dossierCaracteristiques;
    }

    public function addDossierCaracteristique(DossierCaracteristique $dossierCaracteristique): self
    {
        if (!$this->dossierCaracteristiques->contains($dossierCaracteristique)) {
            $this->dossierCaracteristiques[] = $dossierCaracteristique;
            $dossierCaracteristique->setCaracteristique($this);
        }

        return $this;
    }

    public function removeDossierCaracteristique(DossierCaracteristique $dossierCaracteristique): self
    {
        if ($this->dossierCaracteristiques->removeElement($dossierCaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($dossierCaracteristique->getCaracteristique() === $this) {
                $dossierCaracteristique->setCaracteristique(null);
            }
        }

        return $this;
    }
}
