<?php


namespace MartianRobot\Service\Renderer;

use MartianRobot\Entity\Robot;

class StdOutRenderer
{
    /**
     * @var Robot
     */
    private $robot;

    /**
     * StdOutRenderer constructor.
     * @param Robot $robot
     */
    public function __construct(Robot $robot)
    {

        $this->robot = $robot;
    }
    public function render()
    {
        if ($this->robot->getStatus() !== 'LOST') {
            fwrite(STDOUT, "{$this->robot->getCoordinate()->getX()} {$this->robot->getCoordinate()->getY()} {$this->robot->getDirection()}" . PHP_EOL);
        } else {
            fwrite(STDOUT, "{$this->robot->getCoordinate()->getX()} {$this->robot->getCoordinate()->getY()} {$this->robot->getDirection()} LOST" . PHP_EOL);
        }
    }
}