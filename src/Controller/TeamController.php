<?php

namespace App\Controller;

use App\Entity\Hero;
use App\Entity\Team;
use App\Repository\HeroRepository;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TeamController extends AbstractController
{
    #region GET AVAILABLE TEAMS BY CATEGORY
    #[OA\Get(
        tags: ["Team"],
        summary: "Get available teams by category",
    )]
    #[Route("/api/teams/{category}", name: "team.get", methods: ["GET"])]
    public function Get(TeamRepository $teamRepository, $category): JsonResponse
    {
        if ($category == "attaque") {
            $teams = $teamRepository->findBy(["attacker" => null]);
        } elseif ($category == "defense") {
            $teams = $teamRepository->findBy(["defenser" => null]);
        } elseif ($category == "support") {
            $teams = $teamRepository->findBy(["Supporter" => null]);
        } else {
            return $this->json([
                "success" => false,
                "message" => "Unknown category..."
            ]);
        }
        $response = [];
        foreach ($teams as $key => $team) {
            $_team = [
                "teamname" => $team->getTeamname(),
                "attacker" => $team->getAttacker() == null ? "" : $team->getAttacker()->getHeroname(),
                "defenser" => $team->getDefenser() == null ? "" : $team->getDefenser()->getHeroname(),
                "supporter" => $team->getSupporter() == null ? "" : $team->getSupporter()->getHeroname(),
            ];
            $response[] = $_team;
        }
        return $this->json($response);
    }
    #endregion


    #region INSERT A HERO IN A TEAM
    #[OA\Post(
        tags: ["Team"],
        summary: "Insert a hero in a team",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(
                            property: "email",
                            type: "string",
                            example: "example@fg.hero"
                        ),
                        new OA\Property(
                            property: "category",
                            type: "string",
                            example: "attaque"
                        ),
                    ]
                )
            )
        ),
    )]
    #[Route("/api/teams/{teamname}/new", name: "team.insert", methods: ["POST"])]
    public function Insert(EntityManagerInterface $em, Team $team = null, HeroRepository $heroRepository, Request $request): JsonResponse
    {
        if (!$team) {
            return $this->json([
                "success" => false,
                "message" => "Team not found"
            ]);
        }
        $requestData = json_decode($request->getContent(), true);

        $hero = $heroRepository->findOneBy([
            'email' => $requestData['email']
        ]);

        $cgr = $requestData['category'];

        if($cgr == "attaque")
        {
            $team->setAttacker($hero);
        }
        elseif($cgr == "defense")
        {
            $team->setDefenser($hero);
        }
        elseif($cgr == "support")
        {
            $team->setSupporter($hero);
        }
        else{
            return $this->json([
                "success" => false,
                "message" => "Category not valid"
            ]);
        }

        $em->flush();

        return $this->json([
            "success" => true,
            "message" => "Added in a team successfully"
        ]);
    }
    #endregion
}
