<?php

namespace App\Controller;

use App\Entity\Hero;
use App\Repository\HeroRepository;
use Doctrine\ORM\EntityManagerInterface;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HeroController extends AbstractController
{
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
    #[Route('/api/registration/{email}', name: 'hero.registrate', methods: ['POST'])]
    public function Registrate(Request $request,$email, EntityManagerInterface $em, SecurityController $securityController, HeroRepository $heroRepository, Hero $hero = null): JsonResponse
    {
        if($hero)
        {
            return $this->json([
                'success' => false,
                'message'=> 'email or heroname already used'
            ]);
        }

        $requestData = json_decode($request->getContent(), true);

        $heroname = $requestData['heroname'];
        $plainPassword = $requestData['password'];
        $powerdescription = $requestData['powerdescription'];
        $category = $requestData['category'];

        $existingHero = $heroRepository->findOneBy(['heroname' => $heroname]);

        if ($existingHero) {
            return new JsonResponse([
                'success' => false,
                'message'=> 'email or heroname already used'
            ]);
        }

        $hero = new Hero();
        $hero->setCategory($category)
            ->setHeroname($heroname)
            ->setEmail($email)
            ->setPassword(password_hash($plainPassword, PASSWORD_DEFAULT))
            ->setPowerdescription($powerdescription);

        $em->persist($hero);
        $em->flush();

        $heroId = $heroRepository->findOneBy(["heroname" => $heroname])->getId();

        return $this->json([
            "token" => $securityController->_GenerateToken($email)
        ]);
    }
    #endregion


    #region UPDATE POSERDESCRIPTION AND CATEGORY
    #[OA\Put(
        tags: ["Hero"],
        summary: "Update power description and category",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\MediaType(
                mediaType: "application/json",
                schema: new OA\Schema(
                    properties: [new OA\Property(
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
    #[Route('/api/heroes/{email}/update', name: 'hero.update', methods: ['PUT'])]
    public function Update(Request $request, EntityManagerInterface $em, SecurityController $securityController, HeroRepository $heroRepository, Hero $hero = null): JsonResponse
    {
        if(!$hero)
        {
            $response = [
                'status'=> 'error',
                'message'=> 'Hero not found'
            ];
            return new JsonResponse($response);
        }
        $requestData = json_decode($request->getContent(), true);

        $powerdescription = $requestData['powerdescription'];
        $category = $requestData['category'];

        $hero->setCategory($category)
            ->setPowerdescription($powerdescription);

        $em->flush();

        $response = [
            'status'=> 'success',
            'message'=> 'Updated successfully',
        ];

        return $this->json($response);
    }
    #endregion


    #region GET ALL HEROES HERONAMES
    #[OA\Get(
        tags: ["Hero"],
        summary: "Get all heroes heronames",
    )]
    #[Route("/api/heroes/heronames", name: "hero.getAllHeronames", methods: ["GET"])]
    public function GetAllHeronames(HeroRepository $heroRepository): JsonResponse
    {
        $heroes = $heroRepository->findAll();
        $response = [];

        foreach ($heroes as $key => $hero) {
            $response[] = $hero->getHeroname();
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
    #[Route("/api/heroes/{email}/infos", name: "hero.getHeroInfo", methods: ["GET"])]
    public function GetHeroInfo(HeroRepository $heroRepository, Hero $hero = null): JsonResponse
    {
        if (!$hero) {
            $response = [
                "success" => false,
                "message" => "Hero not found..."
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


    #region GET A HERO'S HERONAME
    #[OA\Get(
        tags: ["Hero"],
        summary: "Get a hero's heroname",
    )]
    #[Route("/api/heroes/{email}/infos/heroname", name: "hero.getHeroName", methods: ["GET"])]
    public function GetHeroName(HeroRepository $heroRepository, Hero $hero = null): JsonResponse
    {
        if (!$hero) {
            $response = [
                "success" => false,
                "message" => "Hero not found..."
            ];
            return $this->json($response);
        }

        $response = [
            "heroname" => $hero->getHeroname(),
        ];

        return $this->json($response);
    }
    #endregion


    #region GET A HERO'S POWERDESCRIPTION
    #[OA\Get(
        tags: ["Hero"],
        summary: "Get a hero's powerdescription",
    )]
    #[Route("/api/heroes/{email}/infos/powerdescription", name: "hero.getHeroPowerdescription", methods: ["GET"])]
    public function GetHeroPowerdescription(HeroRepository $heroRepository, Hero $hero = null): JsonResponse
    {
        if (!$hero) {
            $response = [
                "success" => false,
                "message" => "Hero not found..."
            ];
            return $this->json($response);
        }

        $response = [
            "powerdescription" => $hero->getPowerdescription(),
        ];

        return $this->json($response);
    }
    #endregion


    #region GET A HERO'S CATEGORY
    #[OA\Get(
        tags: ["Hero"],
        summary: "Get a hero's category",
    )]
    #[Route("/api/heroes/{email}/infos/category", name: "hero.getHeroCategory", methods: ["GET"])]
    public function GetHeroCategory(HeroRepository $heroRepository, Hero $hero = null): JsonResponse
    {
        if (!$hero) {
            $response = [
                "success" => false,
                "message" => "Hero not found..."
            ];
            return $this->json($response);
        }

        $response = [
            "category" => $hero->getCategory(),
        ];

        return $this->json($response);
    }
    #endregion
}