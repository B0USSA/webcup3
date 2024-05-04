<?php

namespace App\Controller;

use App\Repository\AnalyseQuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;

class AnalyseController extends AbstractController
{
    #region GET 4 RANDOM QUESTIONS
    #[OA\Get(
        tags: ["Questions Analyse"],
        summary: "Get 4 random questions",
    )]
    #[Route("/api/analyse", name: "analyse.getRandomQuestions", methods: ["GET"])]
    public function GetRandomQuestions(AnalyseQuestionsRepository $analyseQuestionsRepository): JsonResponse
    {
        $questions = $analyseQuestionsRepository->findAll();

        $ids = [];
        foreach ($questions as $question) {
            $ids[] = $question->getId();
        }

        shuffle($ids);

        $randomIds = array_slice($ids, 0, 4);

        $randomQuestions = [];
        foreach ($randomIds as $id) {
            $question = $analyseQuestionsRepository->findOneBy(["id" => $id]);
            if ($question !== null) {
                $randomQuestions[] = [
                    "question" => $question->getQuestion(),
                    "answers" => [
                        $question->getAnalyseAnswers()->getFirstanswer(),
                        $question->getAnalyseAnswers()->getSecondanswer(),
                        $question->getAnalyseAnswers()->getThirdanswer(),
                    ],
                ];
            }
        }

        return new JsonResponse($randomQuestions);
    }
    #endregion
}
