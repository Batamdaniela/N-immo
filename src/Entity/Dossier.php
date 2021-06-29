<?php

namespace App\Entity;

use App\Repository\DossierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierRepository::class)
 */
class Dossier
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
    private $quartiers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;


    /**
     * @ORM\Column(type="integer")
     */
    private $montant_min;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant_max;

    /**
     * @ORM\Column(type="integer")
     */
    private $cout;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_expiration;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_paiement;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="dossiers")
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity=DossierCategorie::class, mappedBy="dossier")
     */
    private $dossierCategories;

    /**
     * @ORM\OneToMany(targetEntity=DossierCarateristique::class, mappedBy="dossier")
     */
    private $dossierCarateristiques;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_transaction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat_transaction;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="dossier")
     */
    private $reservations;

    public function __construct()
    {
        $this->dossierCategories = new ArrayCollection();
        $this->dossierCarateristiques = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuartiers(): ?string
    {
        return $this->quartiers;
    }

    public function setQuartiers(string $quartiers): self
    {
        $this->quartiers = $quartiers;

        return $this;
    }

    public function getVilles(): ?string
    {
        return $this->villes;
    }

    public function setVilles(string $villes): self
    {
        $this->villes = $villes;

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

    public function getMontantMin(): ?int
    {
        return $this->montant_min;
    }

    public function setMontantMin(int $montant_min): self
    {
        $this->montant_min = $montant_min;

        return $this;
    }

    public function getMontantMax(): ?int
    {
        return $this->montant_max;
    }

    public function setMontantMax(int $montant_max): self
    {
        $this->montant_max = $montant_max;

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    public function setDateExpiration(\DateTimeInterface $date_expiration): self
    {
        $this->date_expiration = $date_expiration;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->date_paiement;
    }

    public function setDatePaiement(\DateTimeInterface $date_paiement): self
    {
        $this->date_paiement = $date_paiement;

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
            $dossierCategory->setDossier($this);
        }

        return $this;
    }

    public function removeDossierCategory(DossierCategorie $dossierCategory): self
    {
        if ($this->dossierCategories->removeElement($dossierCategory)) {
            // set the owning side to null (unless already changed)
            if ($dossierCategory->getDossier() === $this) {
                $dossierCategory->setDossier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DossierCarateristique[]
     */
    public function getDossierCarateristiques(): Collection
    {
        return $this->dossierCarateristiques;
    }

    public function addDossierCarateristique(DossierCarateristique $dossierCarateristique): self
    {
        if (!$this->dossierCarateristiques->contains($dossierCarateristique)) {
            $this->dossierCarateristiques[] = $dossierCarateristique;
            $dossierCarateristique->setDossier($this);
        }

        return $this;
    }

    public function removeDossierCarateristique(DossierCarateristique $dossierCarateristique): self
    {
        if ($this->dossierCarateristiques->removeElement($dossierCarateristique)) {
            // set the owning side to null (unless already changed)
            if ($dossierCarateristique->getDossier() === $this) {
                $dossierCarateristique->setDossier(null);
            }
        }

        return $this;
    }

    public function getIdTransaction(): ?int
    {
        return $this->id_transaction;
    }

    public function setIdTransaction(int $id_transaction): self
    {
        $this->id_transaction = $id_transaction;

        return $this;
    }

    public function getEtatTransaction(): ?string
    {
        return $this->etat_transaction;
    }

    public function setEtatTransaction(string $etat_transaction): self
    {
        $this->etat_transaction = $etat_transaction;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setDossier($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getDossier() === $this) {
                $reservation->setDossier(null);
            }
        }

        return $this;
    }
}
