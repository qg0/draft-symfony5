<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use \Exception;

class AppFixtures extends Fixture
{
    /**
     * Load data
     *
     * @param ObjectManager $em
     *
     * @return null
     *
     * @throws Exception
     */
    public function load(ObjectManager $em)
    {
    }

    /**
     * Get dependencies
     *
     * @return array
     *
     * @throws Exception
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CityFixtures::class,
        ];
    }
}
