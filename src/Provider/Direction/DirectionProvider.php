<?php


namespace MartianRobot\Provider\Direction;


class DirectionProvider
{
    /**
     * @var array
     */
    private $provider;

    /**
     * DirectionProvider constructor.
     */
    public function __construct()
    {
        $this->provider = [];
    }

    /**
     * @param DirectionInterface $direction
     * @param string $key
     */
    public function addProvider(DirectionInterface $direction, string $key): void
    {
        $this->provider[$key] = $direction;
    }

    /**
     * @param string $key
     * @return DirectionInterface
     */
    public function provide(string $key): DirectionInterface
    {
        return $this->provider[$key];
    }
}