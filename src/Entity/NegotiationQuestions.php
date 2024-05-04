<?php

namespace App\Entity;

use App\Repository\NegotiationQuestionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NegotiationQuestionsRepository::class)]
class NegotiationQuestions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\OneToOne(mappedBy: 'idquestion', cascade: ['persist', 'remove'])]
    private ?NegotiationAnswers $negotiationAnswers = null;

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

    public function getNegotiationAnswers(): ?NegotiationAnswers
    {
        return $this->negotiationAnswers;
    }

    public function setNegotiationAnswers(?NegotiationAnswers $negotiationAnswers): static
    {
        // unset the owning side of the relation if necessary
        if ($negotiationAnswers === null && $this->negotiationAnswers !== null) {
            $this->negotiationAnswers->setIdquestion(null);
        }

        // set the owning side of the relation if necessary
        if ($negotiationAnswers !== null && $negotiationAnswers->getIdquestion() !== $this) {
            $negotiationAnswers->setIdquestion($this);
        }

        $this->negotiationAnswers = $negotiationAnswers;

        return $this;
    }
}
