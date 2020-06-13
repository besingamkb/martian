<?php


namespace MartianRobot\Service\Maps;

use MartianRobot\Entity\Coordinate;

class GridMap implements MapInterface
{
    /**
     * @var array
     */
    private $coordinates;

    public function __construct(int $x, int $y)
    {
        $this->createMap($x, $y);
    }

    /**
     * @param int $x
     * @param int $y
     * @return void
     */
    private function createMap(int $x, int $y): void
    {
        $index = 0;
        for ($i = 0; $i <= $x; $i++) {
            for ($j = 0; $j <= $y; $j++) {
                $this->coordinates[$index] = new Coordinate($index, $i, $j);
                $index++;
            }
        }
    }

    /**
     * @return array
     */
    public function getMap(): array
    {
        return $this->coordinates;
    }
}
