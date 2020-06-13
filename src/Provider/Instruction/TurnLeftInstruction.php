<?php


namespace MartianRobot\Provider\Instruction;


use MartianRobot\Entity\Coordinate;
use MartianRobot\Entity\Robot;
use MartianRobot\Provider\Direction\DirectionInterface;
use MartianRobot\Service\Maps\CoordinateFinder;

class TurnLeftInstruction implements InstructionInterface
{

    /**
     * @var CoordinateFinder
     */
    private $coordinateFinder;

    public function __construct(CoordinateFinder $coordinateFinder)
    {
        $this->coordinateFinder = $coordinateFinder;
    }

    public function action(Robot $robot, DirectionInterface $direction)
    {
        try {
            $leftCoordinate = $direction->turnRight($robot->getCoordinate());
            $this->coordinateFinder->setCoordinate(
                $leftCoordinate['x'],
                $leftCoordinate['y']
            );
            $robot->setDirection($direction->leftDirection);
            $robot->setTargetCoordinate($this->coordinateFinder->getCoordinate());
        } catch (\Exception $e) {
            $robot->setStatus('LOST');
        }

        return $robot;
    }
}