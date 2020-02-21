<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * Password encoder
     */
    private $encoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

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
        $userNames = ['admin', 'user', 'root', 'administrator',];
        foreach ($userNames as $userName) {
            $user = new User();
            $user->setUsername($userName);
            $user->setRoles(['ROLE_ADMIN']);
            $password = $this->encoder->encodePassword($user, $userName);
            $user->setPassword($password);
            $em->persist($user);
        }

        $em->flush();
    }
}
