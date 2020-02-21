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

use App\Entity\City;
use App\Entity\WorldPart;
use Doctrine\ORM\Mapping as ORM;
use \Exception;

/**
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
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
     * Related cities
     *
     * @ORM\OneToMany(targetEntity="City", mappedBy="country")
     */
    private $cities;

    /**
     * @ORM\ManyToOne(targetEntity="WorldPart", inversedBy="countries")
     * @ORM\JoinColumn(name="world_part_id", referencedColumnName="id", onDelete="set null")
     */
    private $worldPart;

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
     * @param string $id
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
     * Get the part of the world
     *
     * @return WorldPart
     */
    public function getWorldPart()
    {
        return $this->worldPart;
    }

    /**
     * Set the part of the world
     *
     * @param WorldPart $worldPart
     */
    public function setWorldPart(WorldPart $worldPart): void
    {
        $this->worldPart = $worldPart;
    }

    /**
     * Get cities
     *
     * @return object
     */
    public function getCities() : object
    {
        return $this->cities;
    }

    /**
     * Set the cities
     *
     * @param array $cities
     */
    public function setCities(array $cities): void
    {
        $this->cities = $cities;
    }
}
