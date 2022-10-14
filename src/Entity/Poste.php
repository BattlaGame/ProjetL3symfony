<?php

namespace App\Entity;

use App\Repository\PosteRepository;
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

    #[ORM\OneToOne(mappedBy: 'poste', cascade: ['persist', 'remove'])]
    private ?Adherent $adherent = null;

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
}
