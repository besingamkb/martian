<?php


namespace MartianRobot\Service\Robot;


use MartianRobot\Entity\Robot;
use MartianRobot\Provider\Direction\DirectionInterface;
use MartianRobot\Provider\Instruction\InstructionInterface;

class InstructRobot
{
    /**
     * @var Robot
     */
    private $robot;
    /**
     * @var InstructionInterface
     */
    private $instruction;
    /**
     * @var DirectionInterface
     */
    private $direction;

    /**
     * InstructRobot constructor.
     * @param Robot $robot
     * @param InstructionInterface $instruction
     * @param DirectionInterface $direction
     */
    public function __construct(Robot $robot, InstructionInterface $instruction, DirectionInterface $direction)
    {

        $this->robot = $robot;
        $this->instruction = $instruction;
        $this->direction = $direction;
    }

    public function execute()
    {
        $this->instruction->action($this->robot, $this->direction);
    }
}