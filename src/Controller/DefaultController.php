<?php

namespace App\Controller;

use App\Entity\WorldPart;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function defaultAction(Request $request)
    {
        $em = $this->container->get('doctrine')->getManager(); /** @var $em EntityManager */

        $worldParts = $em->getRepository('App:WorldPart')->findAll();

        $items = [];

        foreach ($worldParts as $worldPart) { /** @var $worldPart WorldPart */
            $cities = $em->getRepository('App:City')->createQueryBuilder('city')
                ->addSelect('city')
                ->leftJoin('city.country', 'country')
                ->leftJoin('country.worldPart', 'wp')
                ->andWhere('wp.title = :title')->setParameter('title', $worldPart->getTitle())
                ->addOrderBy('city.population', 'DESC')
                ->getQuery()->getResult();

            $items[$worldPart->getTitle()] = $cities;
        }

        return $this->render('default/list.html.twig', [
            'worldParts' => $worldParts,
            'items'      => $items,
        ]);
    }
}
