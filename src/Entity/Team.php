<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $teamname = null;

    #[ORM\OneToOne(inversedBy: 'team', cascade: ['persist', 'remove'])]
    private ?Hero $attacker = null;

    #[ORM\OneToOne(inversedBy: 'team', cascade: ['persist', 'remove'])]
    private ?Hero $defenser = null;

    #[ORM\OneToOne(inversedBy: 'team', cascade: ['persist', 'remove'])]
    private ?Hero $Supporter = null;

    #[ORM\Column(length: 255)]
    private ?string $representationImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeamname(): ?string
    {
        return $this->teamname;
    }

    public function setTeamname(string $teamname): static
    {
        $this->teamname = $teamname;

        return $this;
    }

    public function getAttacker(): ?Hero
    {
        return $this->attacker;
    }

    public function setAttacker(?Hero $attacker): static
    {
        $this->attacker = $attacker;

        return $this;
    }

    public function getDefenser(): ?Hero
    {
        return $this->defenser;
    }

    public function setDefenser(?Hero $defenser): static
    {
        $this->defenser = $defenser;

        return $this;
    }

    public function getSupporter(): ?Hero
    {
        return $this->Supporter;
    }

    public function setSupporter(?Hero $Supporter): static
    {
        $this->Supporter = $Supporter;

        return $this;
    }

    public function getRepresentationImage(): ?string
    {
        return $this->representationImage;
    }

    public function setRepresentationImage(string $representationImage): static
    {
        $this->representationImage = $representationImage;

        return $this;
    }
}
