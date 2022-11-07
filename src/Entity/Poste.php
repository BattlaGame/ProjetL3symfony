<?php

namespace App\Entity;

use App\Repository\PosteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PosteRepository::class)]
class Poste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $namePoste = null;

    #[ORM\OneToMany(mappedBy: 'adherent', targetEntity: adherent::class)]
    private Collection $adherent;

    public function __construct()
    {
        $this->poste_adherent = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePoste(): ?string
    {
        return $this->namePoste;
    }

    public function setNamePoste(string $namePoste): self
    {
        $this->namePoste = $namePoste;

        return $this;
    }

    public function getAdherent(): ?Adherent
    {
        return $this->adherent;
    }

    public function setAdherent(Adherent $adherent): self
    {
        // set the owning side of the relation if necessary
        if ($adherent->getPoste() !== $this) {
            $adherent->setPoste($this);
        }

        $this->adherent = $adherent;

        return $this;
    }

    public function __toString()
    {
        return $this->getNamePoste();
    }

    /**
     * @return Collection<int, adherent>
     */
    public function getPosteAdherent(): Collection
    {
        return $this->poste_adherent;
    }

    public function addPosteAdherent(adherent $posteAdherent): self
    {
        if (!$this->poste_adherent->contains($posteAdherent)) {
            $this->poste_adherent->add($posteAdherent);
            $posteAdherent->setPosteAdherent($this);
        }

        return $this;
    }

    public function removePosteAdherent(adherent $posteAdherent): self
    {
        if ($this->poste_adherent->removeElement($posteAdherent)) {
            // set the owning side to null (unless already changed)
            if ($posteAdherent->getPosteAdherent() === $this) {
                $posteAdherent->setPosteAdherent(null);
            }
        }

        return $this;
    }
}
