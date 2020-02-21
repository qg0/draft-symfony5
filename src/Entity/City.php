<?php

/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 */

namespace App\Entity;

use App\Entity\Country;
use Doctrine\ORM\Mapping as ORM;
use \Exception;

/**
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * The unique auto incremented primary key
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * The title
     *
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * The population amount
     *
     * @ORM\Column(type="integer")
     */
    private $population;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="cities")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", onDelete="set null")
     */
    private $country;

    /**
     * Get the identification number
     *
     * @return string
     *
     * @throws Exception
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * Set the identification number
     *
     * @param  string $id
     *
     * @return void
     *
     * @throws Exception
     */
    public function setId(string $id) : void
    {
        $this->id = $id;
    }

    /**
     * Get the title
     *
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * Set the title
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return integer
     */
    public function getPopulation() : int
    {
        return $this->population;
    }

    /**
     * @param integer $population
     */
    public function setPopulation(int $population): void
    {
        $this->population = $population;
    }

    /**
     * Get the country
     *
     * @return Country
     */
    public function getCountry() : Country
    {
        return $this->country;
    }

    /**
     * Set the country
     *
     * @param Country $country
     */
    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    /**
     * Get the string representation of the object
     *
     * @return string
     *
     * @throws Exception
     */
    public function __toString() : string
    {
        return $this->title;
    }
}
