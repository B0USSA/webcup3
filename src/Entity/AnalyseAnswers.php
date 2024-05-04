<?php

namespace App\Entity;

use App\Repository\AnalyseAnswersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnalyseAnswersRepository::class)]
class AnalyseAnswers
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

    #[ORM\OneToOne(inversedBy: 'analyseAnswers', cascade: ['persist', 'remove'])]
    private ?AnalyseQuestions $idquestion = null;

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

    public function getIdquestion(): ?AnalyseQuestions
    {
        return $this->idquestion;
    }

    public function setIdquestion(?AnalyseQuestions $idquestion): static
    {
        $this->idquestion = $idquestion;

        return $this;
    }
}
