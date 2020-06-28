<?php

namespace App\DataFixtures;

use App\Entity\School;
use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $school = new School();
        $school->setName("CNAM");
        $manager->persist($school);
        $manager->flush();
    }
}
