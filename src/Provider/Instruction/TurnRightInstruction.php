<?php


namespace MartianRobot\Provider\Instruction;

use MartianRobot\Entity\Robot;
use MartianRobot\Provider\Direction\DirectionInterface;
use MartianRobot\Service\Maps\CoordinateFinder;

class TurnRightInstruction implements InstructionInterface
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
            $rightCoordinate = $direction->turnRight($robot->getCoordinate());
            $this->coordinateFinder->setCoordinate(
                $rightCoordinate['x'],
                $rightCoordinate['y']
            );
            $robot->setDirection($direction->rightDirection);
            $robot->setTargetCoordinate($this->coordinateFinder->getCoordinate());
        } catch (\Exception $e) {
            $robot->setStatus('LOST');
        }

        return $robot;
    }
}
