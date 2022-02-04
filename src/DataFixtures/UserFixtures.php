<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasder;
    public const USERS = [
        ['Admin', '', ['ROLE_ADMIN'], 'admin'],
        ['Thomas', 'https://i.pinimg.com/736x/3c/a6/48/3ca648e968f7d832246d7c65aac68c9d.jpg', [''], 'PHPforever'],
    ];

    public function __construct(UserPasswordHasherInterface $passwordHasderInt)
    {
        $this->passwordHasder = $passwordHasderInt;
    }
    public function load(ObjectManager $manager): void
    {
        $key = 0;
        foreach (self::USERS as $user) {
            $newUser = new User();
            $newUser->setUsername($user[0]);
            $newUser->setImage($user[1]);
            $newUser->setRoles($user[2]);
            $plaintextPassword = ($user[3]);
            // hash the password (based on the security.yaml config for the $user class)
            $hashedPassword = $this->passwordHasder->hashPassword(
                $newUser,
                $plaintextPassword
            );
            $newUser->setPassword($hashedPassword);
            $manager->persist($newUser);
            $key++;
        }

        $manager->flush();
    }
}
