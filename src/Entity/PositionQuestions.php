<?php

namespace App\Entity;

use App\Repository\PositionQuestionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionQuestionsRepository::class)]
class PositionQuestions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\OneToOne(mappedBy: 'idquestion', cascade: ['persist', 'remove'])]
    private ?PositionAnswers $positionAnswers = null;

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

    public function getPositionAnswers(): ?PositionAnswers
    {
        return $this->positionAnswers;
    }

    public function setPositionAnswers(?PositionAnswers $positionAnswers): static
    {
        // unset the owning side of the relation if necessary
        if ($positionAnswers === null && $this->positionAnswers !== null) {
            $this->positionAnswers->setIdquestion(null);
        }

        // set the owning side of the relation if necessary
        if ($positionAnswers !== null && $positionAnswers->getIdquestion() !== $this) {
            $positionAnswers->setIdquestion($this);
        }

        $this->positionAnswers = $positionAnswers;

        return $this;
    }
}
