<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $cout;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $periodicite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quartier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vente;

    /**
     * @ORM\OneToMany(targetEntity=Visite::class, mappedBy="article")
     */
    private $visites;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="articles")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="articles")
     */
    private $proprietaire;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="proprietaire")
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="articles")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Favori::class, mappedBy="article")
     */
    private $favoris;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="article")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=OptionArticle::class, mappedBy="article")
     */
    private $optionArticles;

    public function __construct()
    {
        $this->visites = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->favoris = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->optionArticles = new ArrayCollection();
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

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getPeriodicite(): ?string
    {
        return $this->periodicite;
    }

    public function setPeriodicite(string $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(string $quartier): self
    {
        $this->quartier = $quartier;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

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

    public function getVente(): ?bool
    {
        return $this->vente;
    }

    public function setVente(bool $vente): self
    {
        $this->vente = $vente;

        return $this;
    }

    /**
     * @return Collection|Visite[]
     */
    public function getVisites(): Collection
    {
        return $this->visites;
    }

    public function addVisite(Visite $visite): self
    {
        if (!$this->visites->contains($visite)) {
            $this->visites[] = $visite;
            $visite->setArticle($this);
        }

        return $this;
    }

    public function removeVisite(Visite $visite): self
    {
        if ($this->visites->removeElement($visite)) {
            // set the owning side to null (unless already changed)
            if ($visite->getArticle() === $this) {
                $visite->setArticle(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getProprietaire(): ?self
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?self $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(self $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setProprietaire($this);
        }

        return $this;
    }

    public function removeArticle(self $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getProprietaire() === $this) {
                $article->setProprietaire(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Favori[]
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Favori $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris[] = $favori;
            $favori->setArticle($this);
        }

        return $this;
    }

    public function removeFavori(Favori $favori): self
    {
        if ($this->favoris->removeElement($favori)) {
            // set the owning side to null (unless already changed)
            if ($favori->getArticle() === $this) {
                $favori->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setArticle($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getArticle() === $this) {
                $image->setArticle(null);
            }
        }

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
            $optionArticle->setArticle($this);
        }

        return $this;
    }

    public function removeOptionArticle(OptionArticle $optionArticle): self
    {
        if ($this->optionArticles->removeElement($optionArticle)) {
            // set the owning side to null (unless already changed)
            if ($optionArticle->getArticle() === $this) {
                $optionArticle->setArticle(null);
            }
        }

        return $this;
    }
}
