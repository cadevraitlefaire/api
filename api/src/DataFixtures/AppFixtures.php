<?php

namespace App\DataFixtures;

use App\Entity\School;
use App\Entity\Subject;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $school = new School();
        $school->setName("CNAM");

        $type = new Type();
        $type->setName("sheet");

        $type2 = new Type();
        $type2->setName("exam");

        $manager->persist($school);
        $manager->persist($type);
        $manager->persist($type2);
        $manager->flush();
    }
}
