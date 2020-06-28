<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("jenaye");
        $user->setPassword($this->passwordEncoder->encodePassword($user, '!ChangeMe!'));
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $manager->persist($user);
        $manager->flush();
    }

    private $passwordEncoder;


     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
}
