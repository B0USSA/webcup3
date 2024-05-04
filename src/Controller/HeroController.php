<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\Hero;
use App\Repository\FormationRepository;
use App\Repository\HeroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Firebase\JWT\JWT;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HeroController extends AbstractController
{
    #region GENERATE A TOKEN FOR A HERO
    #[OA\Post(
        tags: ["Security"],
        summary: "Generate a token for a hero",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(
                            property: "heroname",
                            type: "string",
                            example: "great explosion..."
                        ),
                        new OA\Property(
                            property: "password",
                            type: "string",
                            example: "password"
                        ),
                    ]
                )
            )
        ),
    )]
    #[Route('/api/token', name: 'hero.generateToken', methods: ['POST'])]
    public function GenerateToken(Request $request, HeroRepository $heroRepository): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);

        $heroname = $requestData['heroname'];
        $plainPassword = $requestData['password'];

        $hero = $heroRepository->findOneBy(['heroname' => $heroname]);
        if ($hero && password_verify($plainPassword, $hero->getPassword())) {
            $heroId = $hero->getId();

            $secretKey = "LUM€N$";
            $token = [
                "sub" => $heroId
            ];

            $jwt = JWT::encode($token, $secretKey, 'HS256');

            return new JsonResponse(['token' => $jwt]);
        }

        return new JsonResponse([
            "success" => false,
            "message" => "Identifiants incorrects."
        ]);
    }
    #endregion


    #region REGISTRATE A NEW HERO
    #[OA\Post(
        tags: ["Hero"],
        summary: "Register a new hero",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [
                        new OA\Property(
                            property: "heroname",
                            type: "string",
                            example: "great explosion..."
                        ),
                        new OA\Property(
                            property: "password",
                            type: "string",
                            example: "password"
                        ),
                        new OA\Property(
                            property: "email",
                            type: "string",
                            example: "example@g.hero"
                        ),
                        new OA\Property(
                            property: "powerdescription",
                            type: "string",
                            example: "My power is great..."
                        ),
                        new OA\Property(
                            property: "category",
                            type: "string",
                            example: "defense"
                        ),
                    ]
                )
            )
        ),
    )]
    #[Route('/api/registration', name: 'hero.registrate', methods: ['POST'])]
    public function Registrate(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);

        $heroname = $requestData['heroname'];
        $email = $requestData['email'];
        $plainPassword = $requestData['password'];
        $powerdescription = $requestData['powerdescription'];
        $category = $requestData['category'];

        $hero = new Hero();
        $hero->setCategory($category)
            ->setHeroname($heroname)
            ->setEmail($email)
            ->setPassword(password_hash($plainPassword, PASSWORD_DEFAULT))
            ->setPowerdescription($powerdescription);

        $em->persist($hero);
        $em->flush();

        return new JsonResponse([
            "success" => true,
            "message" => "Hero registrated successfully..."
        ]);
    }
    #endregion


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
    #[Route('/api/formation/{id}/new', name: 'hero.saveFormation', methods: ['POST'])]
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


    #region GET ALL HEROES NAMES
    #[OA\Get(
        tags: ["Hero"],
        summary: "Get all heroes names",
    )]
    #[Route("/api/heroes/names", name: "hero.getAllNames", methods: ["GET"])]
    public function GetAllNames(HeroRepository $heroRepository): JsonResponse
    {
        $heroes = $heroRepository->findAll();
        $response = [];

        foreach ($heroes as $key => $hero) {
            $response[] = $hero->getHeroname();
        }

        return $this->json($response);
    }
    #endregion
    

    #region GET FORMATION OF A HERO
    #[OA\Get(
        tags: ["Formation"],
        summary: "Get formation of a hero",
    )]
    #[Route("/api/heroes/{id}/formation", name: "hero.getFormation", methods: ["GET"])]
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


    #region GET ALL HEROES EMAILS
    #[OA\Get(
        tags: ["Hero"],
        summary: "Get all heroes emails",
    )]
    #[Route("/api/heroes/emails", name: "hero.getAllEmails", methods: ["GET"])]
    public function GetAllEmails(HeroRepository $heroRepository): JsonResponse
    {
        $heroes = $heroRepository->findAll();
        $response = [];

        foreach ($heroes as $key => $hero) {
            $response[] = $hero->getEmail();
        }

        return $this->json($response);
    }
    #endregion
    

    #region GET A HERO'S INFORMATIONS
    #[OA\Get(
        tags: ["Hero"],
        summary: "Get a hero's informations",
    )]
    #[Route("/api/heroes/{id}/infos", name: "hero.getHeroInfo", methods: ["GET"])]
    public function GetHeroInfo(HeroRepository $heroRepository, Hero $hero = null): JsonResponse
    {
        if(!$hero)
        {
            $response = [
                "success"=> false,
                "message"=> "Hero not found..."
            ];
            return $this->json($response);
        }
        
        $response = [
            "heroname" => $hero->getHeroname(),
            "powerdescription" => $hero->getPowerdescription(),
            "category" => $hero->getCategory()
        ];

        return $this->json($response);
    }
    #endregion
}