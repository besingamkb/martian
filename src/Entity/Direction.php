<?php


namespace MartianRobot\Entity;


use Exception;

class Direction
{
    const CARDINAL_DIRECTION_INITIAL = ['N', 'S', 'E', 'W'];
    /**
     * @var string
     */
    private $direction;

    /**
     * @param string $directionInitial
     * @return Direction
     * @throws Exception
     */
    public function setDirection(string $directionInitial): self
    {
        if (!in_array($directionInitial, self::CARDINAL_DIRECTION_INITIAL)) {
            throw new Exception("Direction initial is not allowed!");
        }

        $this->direction = $directionInitial;
        return $this;
    }

    public function getDirection()
    {
        return $this->direction;
    }
}