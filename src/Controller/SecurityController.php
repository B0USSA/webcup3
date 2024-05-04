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

class SecurityController extends AbstractController
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
            $email = $hero->getEmail();
    
            return new JsonResponse([
                'token' => $this->_GenerateToken($email),
                'email' => $email
            ]);
        }

        return new JsonResponse([
            "success" => false,
            "message" => "Identifiants incorrects."
        ]);
    }

    public function _GenerateToken($email)
    {
        $secretKey = "LUM€N$";
        $token = [
            "iat" => time(),
            "exp" => time() + (3600*3), 
            "sub" => $email
        ];

        $jwt = JWT::encode($token, $secretKey, 'HS256');

        return $jwt;
    }
    #endregion
}