<?php


namespace MartianRobot\Service\Maps;


use Exception;
use MartianRobot\Entity\Coordinate;

class CoordinateFinder
{
    /**
     * @var MapInterface
     */
    private $map;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @param MapInterface $map
     */
    public function setMap(MapInterface $map)
    {
        $this->map = $map;
    }

    /**
     * CoordinateFinder constructor.
     * @param int $x
     * @param int $y
     */
    public function setCoordinate(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return Coordinate
     * @throws Exception
     */
    public function getCoordinate(): Coordinate
    {
        foreach ($this->map->getMap() as $coordinate) {
            if ($coordinate->getX() === $this->x && $coordinate->getY() === $this->y) {
                return $coordinate;
            }
        }

        throw new Exception('No Coordinate Found! Robot are Lost!');
    }

}