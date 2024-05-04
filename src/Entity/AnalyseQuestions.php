<?php

namespace App\Entity;

use App\Repository\AnalyseQuestionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnalyseQuestionsRepository::class)]
class AnalyseQuestions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\OneToOne(mappedBy: 'idquestion', cascade: ['persist', 'remove'])]
    private ?AnalyseAnswers $analyseAnswers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getAnalyseAnswers(): ?AnalyseAnswers
    {
        return $this->analyseAnswers;
    }

    public function setAnalyseAnswers(?AnalyseAnswers $analyseAnswers): static
    {
        // unset the owning side of the relation if necessary
        if ($analyseAnswers === null && $this->analyseAnswers !== null) {
            $this->analyseAnswers->setIdquestion(null);
        }

        // set the owning side of the relation if necessary
        if ($analyseAnswers !== null && $analyseAnswers->getIdquestion() !== $this) {
            $analyseAnswers->setIdquestion($this);
        }

        $this->analyseAnswers = $analyseAnswers;

        return $this;
    }
}
