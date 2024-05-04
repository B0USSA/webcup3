<?php

namespace App\Controller;

use App\Entity\Level;
use App\Repository\LevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;

class LevelController extends AbstractController
{
    #region GET A HERO'S CATEGORY
    #[OA\Get(
        tags: ["Level"],
        summary: "Get a hero's category",
    )]
    #[Route("/api/level/{category}", name: "hero.getTextsLevel", methods: ["GET"])]
    public function GetTextsLevel(LevelRepository $levelRepositor, $category): JsonResponse
    {
        $levels = $levelRepositor->findBy(["category"=> $category]);
        $response = [];

        foreach ($levels as $key => $level) {
            $_level = [
                "category" => $level->getCategory(),
                "level" => $level->getLevel(),
                "leveltitle" => $level->getLeveltitle(),
            ];

            $response[] = $_level;
        }

        return $this->json($response);
    }
    #endregion
}
