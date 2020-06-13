<?php


namespace MartianRobot\Entity;


class Coordinate
{
    /**
     * @var int
     */
    private $index;
    /**
     * @var int
     */
    private $x;
    /**
     * @var int
     */
    private $y;

    public function __construct(int $index, int $x, int $y)
    {
        $this->index = $index;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }
}