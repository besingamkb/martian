<?php

namespace MartianRobot\Provider\Direction;

use MartianRobot\Entity\Coordinate;

class SouthDirection implements DirectionInterface
{
    const LEFT_DIRECTION = 'E';
    const RIGHT_DIRECTION = 'W';
    /**
     * @var string
     */
    public $leftDirection;
    /**
     * @var string
     */
    public $rightDirection;

    public function __construct()
    {
        $this->leftDirection = self::LEFT_DIRECTION;
        $this->rightDirection = self::RIGHT_DIRECTION;
    }

    public function turnLeft(Coordinate $coordinate): array
    {
        return [
            'x' => $coordinate->getX() +1, 'y' => $coordinate->getY()
        ];
    }

    public function turnRight(Coordinate $coordinate): array
    {
        return [
            'x' => $coordinate->getX() -1, 'y' => $coordinate->getY()
        ];
    }

    public function forward(Coordinate $coordinate): array
    {
        return [
            'x' => $coordinate->getX(), 'y' => $coordinate->getY() -1
        ];
    }
}