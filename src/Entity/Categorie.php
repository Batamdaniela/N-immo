<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="categorie")
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="categories")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="categorie")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=DossierCategorie::class, mappedBy="categorie")
     */
    private $dossierCategories;

    /**
     * @ORM\OneToMany(targetEntity=Recherche::class, mappedBy="categorie")
     */
    private $recherches;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->dossierCategories = new ArrayCollection();
        $this->recherches = new ArrayCollection();
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

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setCategorie($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getCategorie() === $this) {
                $article->setCategorie(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?self
    {
        return $this->categorie;
    }

    public function setCategorie(?self $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(self $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setCategorie($this);
        }

        return $this;
    }

    public function removeCategory(self $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCategorie() === $this) {
                $category->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DossierCategorie[]
     */
    public function getDossierCategories(): Collection
    {
        return $this->dossierCategories;
    }

    public function addDossierCategory(DossierCategorie $dossierCategory): self
    {
        if (!$this->dossierCategories->contains($dossierCategory)) {
            $this->dossierCategories[] = $dossierCategory;
            $dossierCategory->setCategorie($this);
        }

        return $this;
    }

    public function removeDossierCategory(DossierCategorie $dossierCategory): self
    {
        if ($this->dossierCategories->removeElement($dossierCategory)) {
            // set the owning side to null (unless already changed)
            if ($dossierCategory->getCategorie() === $this) {
                $dossierCategory->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Recherche[]
     */
    public function getRecherches(): Collection
    {
        return $this->recherches;
    }

    public function addRecherch(Recherche $recherch): self
    {
        if (!$this->recherches->contains($recherch)) {
            $this->recherches[] = $recherch;
            $recherch->setCategorie($this);
        }

        return $this;
    }

    public function removeRecherch(Recherche $recherch): self
    {
        if ($this->recherches->removeElement($recherch)) {
            // set the owning side to null (unless already changed)
            if ($recherch->getCategorie() === $this) {
                $recherch->setCategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this-> nom;
    }
}
