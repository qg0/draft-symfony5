<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Country;
use App\Entity\WorldPart;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends Fixture
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
        $worldParts = [
            'Азия' => [
                'Япония' => [
                    [
                        'city'       => 'Токио',
                        'population' => 38500,
                    ],
                    [
                        'city'       => 'Осака',
                        'population' => 17165,
                    ],
                ],
                'Индонезия' => [
                    [
                        'city'       => 'Джакарта',
                        'population' => 32275,
                    ],
                ],
                'Индия' => [
                    [
                        'city'       => 'Дели',
                        'population' => 27280,
                    ],
                    [
                        'city'       => 'Мумбаи',
                        'population' => 23265,
                    ],
                ],
                'Филиппины' => [
                    [
                        'city'       => 'Манила',
                        'population' => 24650,
                    ],
                ],
                'Китай' => [
                    [
                        'city'       => 'Шанхай',
                        'population' => 24115,
                    ],
                    [
                        'city'       => 'Пекин',
                        'population' => 21200,
                    ],
                    [
                        'city'       => 'Гуанчжоу',
                        'population' => 20060,
                    ],
                ],
            ],
            'Америка' => [
                'США' => [
                    [
                        'city'       => 'Нью-Йорк',
                        'population' => 21757,
                    ],
                    [
                        'city'       => 'Лос-Анджелес',
                        'population' => 15620,
                    ],
                    [
                        'city'       => 'Чикаго',
                        'population' => 9100,
                    ],
                    [
                        'city'       => 'Даллас',
                        'population' => 6600,
                    ],
                    [
                        'city'       => 'Сан-Хосе',
                        'population' => 6500,
                    ],
                ],
                'Бразилия' => [
                    [
                        'city'       => 'Сан-Пауло',
                        'population' => 21100,
                    ],
                ],
                'Мексика' => [
                    [
                        'city'       => 'Мехико',
                        'population' => 20500,
                    ],
                ],
                'Аргентина' => [
                    [
                        'city'       => 'Буэнос-Айрес',
                        'population' => 15520,
                    ],
                ],
                'Перу' => [
                    [
                        'city'       => 'Лима',
                        'population' => 11300,
                    ],
                ],
            ],
            'Африка' => [
                'Египет' => [
                    [
                        'city'       => 'Каир',
                        'population' => 16545,
                    ],
                    [
                        'city'       => 'Александрия',
                        'population' => 4960,
                    ],
                    [
                        'city'       => 'Гиза',
                        'population' => 3300,
                    ],
                ],
                'Нигерия' => [
                    [
                        'city'       => 'Лагос',
                        'population' => 13900,
                    ],
                ],
                'Конго' => [
                    [
                        'city'       => 'Киншаса',
                        'population' => 12500,
                    ],
                ],
                'ЮАР' => [
                    [
                        'city'       => 'Йоханнесбург',
                        'population' => 9115,
                    ],
                ],
                'Ангола' => [
                    [
                        'city'       => 'Луанда',
                        'population' => 7560,
                    ],
                ],
                'Кения' => [
                    [
                        'city'       => 'Найроби',
                        'population' => 5700,
                    ],
                ],
                'Танзания' => [
                    [
                        'city'       => 'Дар-эр-Салам',
                        'population' => 4980,
                    ],
                ],
            ],
            'Европа' => [
                'Россия' => [
                    [
                        'city'       => 'Москва',
                        'population' => 16855,
                    ],
                    [
                        'city'       => 'Санкт-Петербург',
                        'population' => 5175,
                    ],
                ],
                'Турция' => [
                    [
                        'city'       => 'Стамбул',
                        'population' => 13995,
                    ],
                    [
                        'city'       => 'Анкара',
                        'population' => 4850,
                    ],
                ],
                'Испания' => [
                    [
                        'city'       => 'Мадрид',
                        'population' => 6385,
                    ],
                    [
                        'city'       => 'Барселона',
                        'population' => 4840,
                    ],
                ],
                'Франция' => [
                    [
                        'city'       => 'Париж',
                        'population' => 10900,
                    ],
                ],
                'Великобритания' => [
                    [
                        'city'       => 'Лондон',
                        'population' => 10500,
                    ],
                ],
                'Италия' => [
                    [
                        'city'       => 'Милан',
                        'population' => 5200,
                    ],
                ],
            ],
        ];

        foreach ($worldParts as $worldPartTitle => $countries) {
            $worldPart = new WorldPart();
            $worldPart->setTitle($worldPartTitle);

            $em->persist($worldPart);

            foreach ($countries as $countryTitle => $cities) {
                $country = new Country();
                $country->setTitle($countryTitle);
                $country->setWorldPart($worldPart);

                $em->persist($country);

                foreach ($cities as $city) {
                    $cityTitle  = $city['city'];
                    $population = $city['population'];

                    $city = new City();
                    $city->setTitle($cityTitle);
                    $city->setPopulation($population);
                    $city->setCountry($country);

                    $em->persist($city);
                }
            }

            $em->flush();
        }
    }
}
