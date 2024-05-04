<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\UserInformations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Filesystem\Filesystem;

class AppFixtures extends Fixture
{
    private Generator $faker;
    private Filesystem $filesystem;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
        $this->filesystem = new Filesystem();
    }

    public function load(ObjectManager $manager): void
    {
        $users = [];
        for ($i=0; $i < 10; $i++) { 
            $user = new User;
            $user->setEmail($this->faker->email)
                 ->setMotdepasse(password_hash("123", PASSWORD_DEFAULT));
            $users[] = $user;

            $manager->persist($user);
        }
        foreach ($users as $key => $user) {
            $userInformations = new UserInformations();
            $userInformations->setName($this->faker->name())
                             ->setAge($this->faker->numberBetween(1,50))
                             ->setGender(mt_rand(0,1) == 1 ? "male" : "female")
                             ->setUserId($user);

            $manager->persist($userInformations);
        }

        $manager->flush();
    }
}