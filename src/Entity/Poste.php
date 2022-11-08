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

    #[ORM\OneToMany(mappedBy: 'name_poste', targetEntity: Adherent::class)]
    private Collection $adherent;

    public function __construct()
    {
        $this->adherent = new ArrayCollection();
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

    public function __toString()
    {
        return $this->getNamePoste();
    }

    /**
     * @return Collection<int, adherent>
     */
    public function getAdherent(): Collection
    {
        return $this->adherent;
    }

    public function removeAdherent(adherent $adherent): self
    {
        if ($this->adherent->removeElement($adherent)) {
            // set the owning side to null (unless already changed)
            if ($adherent->getNamePoste() === $this) {
                $adherent->setNamePoste(null);
            }
        }

        return $this;
    }
}
