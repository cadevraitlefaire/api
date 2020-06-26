<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("jenaye");
        $user->setPassword("!ChangeMe!");
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $manager->persist($user);
        $manager->flush();
    }
}
