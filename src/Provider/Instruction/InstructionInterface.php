<?php


namespace MartianRobot\Provider\Instruction;


use MartianRobot\Entity\Coordinate;
use MartianRobot\Entity\Robot;
use MartianRobot\Provider\Direction\DirectionInterface;

interface InstructionInterface
{
    public function action(Robot $robot, DirectionInterface $direction);
}