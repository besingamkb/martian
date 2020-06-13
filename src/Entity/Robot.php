<?php

namespace MartianRobot\Entity;

class Robot
{
    /**
     * @var Direction
     */
    private $direction;
    /**
     * @var Coordinate
     */
    private $coordinate;
    /**
     * @var Coordinate
     */
    private $targetCoordinate;
    /**
     * @var string
     */
    private $status = 'active';

    /**
     * @param string $direction
     * @return $this
     */
    public function setDirection(string $direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param Coordinate $coordinate
     * @return $this
     */
    public function setCoordinate(Coordinate $coordinate): self
    {
        $this->coordinate = $coordinate;
        return $this;
    }

    /**
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    public function setTargetCoordinate(Coordinate $coordinate): self
    {
        $this->targetCoordinate = $coordinate;
        return $this;
    }

    public function getTargetCoordinate():Coordinate
    {
        return $this->targetCoordinate;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
