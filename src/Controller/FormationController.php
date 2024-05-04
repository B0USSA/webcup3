<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\Hero;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    #region SAVE A NEW FORMATION
    #[OA\Post(
        tags: ["Formation"],
        summary: "Save a new formation",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(
                            property: "level",
                            type: "integer",
                            example: "1"
                        ),
                        new OA\Property(
                            property: "result",
                            type: "integer",
                            example: "70"
                        ),
                    ]
                )
            )
        ),
    )]
    #[Route('/api/formation/{email}/new', name: 'hero.saveFormation', methods: ['POST'])]
    public function SaveFormation(Request $request, EntityManagerInterface $em, Hero $hero = null): JsonResponse
    {
        if (!$hero) {
            $response = [
                'success' => false,
                'message' => 'Hero not found...'
            ];
            return new JsonResponse($response);
        }

        $requestData = json_decode($request->getContent(), true);

        $formation = new Formation();

        $level = $requestData['level'];
        $result = $requestData['result'];

        $formation->setHeroId($hero)
            ->setResult($result)
            ->setLevel($level);

        $em->persist($formation);
        $em->flush();

        return new JsonResponse([
            "success" => true,
            "message" => "Formation saved successfully..."
        ]);
    }
    #endregion


    #region GET FORMATION OF A HERO
    #[OA\Get(
        tags: ["Formation"],
        summary: "Get formation of a hero",
    )]
    #[Route("/api/heroes/{email}/formation", name: "hero.getFormation", methods: ["GET"])]
    public function GetFormation(FormationRepository $formationRepository, Hero $hero = null): JsonResponse
    {
        if(!$hero)
        {
            $response = [
                "success"=> false,
                "message"=> "Hero not found..."
            ];
            return $this->json($response);
        }

        $formations = $formationRepository->findBy([
            "heroId" => $hero
        ]);

        $response = [];

        foreach ($formations as $key => $formation) {
            $_formation = [
                "level" => $formation->getLevel(),
                "result" => $formation->getResult()
            ];
            $response[] = $_formation;
        }

        return $this->json($response);
    }
    #endregion
}