<?php

namespace App\Entity;

use App\Repository\PositionAnswersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionAnswersRepository::class)]
class PositionAnswers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstanswer = null;

    #[ORM\Column(length: 255)]
    private ?string $secondanswer = null;

    #[ORM\Column(length: 255)]
    private ?string $thirdanswer = null;

    #[ORM\OneToOne(inversedBy: 'positionAnswers', cascade: ['persist', 'remove'])]
    private ?PositionQuestions $idquestion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstanswer(): ?string
    {
        return $this->firstanswer;
    }

    public function setFirstanswer(string $firstanswer): static
    {
        $this->firstanswer = $firstanswer;

        return $this;
    }

    public function getSecondanswer(): ?string
    {
        return $this->secondanswer;
    }

    public function setSecondanswer(string $secondanswer): static
    {
        $this->secondanswer = $secondanswer;

        return $this;
    }

    public function getThirdanswer(): ?string
    {
        return $this->thirdanswer;
    }

    public function setThirdanswer(string $thirdanswer): static
    {
        $this->thirdanswer = $thirdanswer;

        return $this;
    }

    public function getIdquestion(): ?PositionQuestions
    {
        return $this->idquestion;
    }

    public function setIdquestion(?PositionQuestions $idquestion): static
    {
        $this->idquestion = $idquestion;

        return $this;
    }
}
