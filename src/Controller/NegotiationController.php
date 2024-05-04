<?php

namespace App\Controller;

use App\Repository\NegotiationQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;

class NegotiationController extends AbstractController
{
    #region GET 4 RANDOM QUESTIONS
    #[OA\Get(
        tags: ["Questions Negotiation"],
        summary: "Get 4 random questions",
    )]
    #[Route("/api/negotiation", name: "negotiation.getRandomQuestions", methods: ["GET"])]
    public function GetRandomQuestions(NegotiationQuestionsRepository $negotiationQuestionsRepository): JsonResponse
    {
        $questions = $negotiationQuestionsRepository->findAll();

        $ids = [];
        foreach ($questions as $question) {
            $ids[] = $question->getId();
        }

        shuffle($ids);

        $randomIds = array_slice($ids, 0, 4);

        $randomQuestions = [];
        foreach ($randomIds as $id) {
            $question = $negotiationQuestionsRepository->findOneBy(["id" => $id]);
            if ($question !== null) {
                $randomQuestions[] = [
                    "question" => $question->getQuestion(),
                    "answers" => [
                        $question->getNegotiationAnswers()->getFirstanswer(),
                        $question->getNegotiationAnswers()->getSecondanswer(),
                        $question->getNegotiationAnswers()->getThirdanswer(),
                    ],
                ];
            }
        }

        return new JsonResponse($randomQuestions);
    }
    #endregion
}
