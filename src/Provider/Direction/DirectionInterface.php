<?php


namespace MartianRobot\Provider\Direction;


use MartianRobot\Entity\Coordinate;

interface DirectionInterface
{
    public function turnLeft(Coordinate $coordinate): array;
    public function turnRight(Coordinate $coordinate): array;
    public function forward(Coordinate $coordinate): array;
}