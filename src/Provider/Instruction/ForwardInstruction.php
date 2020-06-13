<?php


namespace MartianRobot\Provider\Instruction;

use MartianRobot\Entity\Robot;
use MartianRobot\Provider\Direction\DirectionInterface;
use MartianRobot\Service\Maps\CoordinateFinder;

class ForwardInstruction implements InstructionInterface
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
            $forwardCoordinate = $direction->forward($robot->getCoordinate());
            $this->coordinateFinder->setCoordinate(
                $forwardCoordinate['x'],
                $forwardCoordinate['y']
            );
            $coordinate = $robot->getTargetCoordinate()->getIndex() === $robot->getCoordinate()->getIndex()
                ? $this->coordinateFinder->getCoordinate()
                : $robot->getTargetCoordinate();
            $robot->setCoordinate($coordinate);
            $robot->setTargetCoordinate($this->coordinateFinder->getCoordinate());
        } catch (\Exception $e) {
            $robot->setStatus('LOST');
        }

        return $robot;
    }
}