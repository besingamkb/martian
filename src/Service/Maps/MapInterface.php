<?php


namespace MartianRobot\Service\Maps;


interface MapInterface
{
    public function __construct(int $x, int $y);
    public function getMap(): array;
}