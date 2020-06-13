<?php


namespace MartianRobot\Tests\Unit\Provider\Instruction;


use MartianRobot\Entity\Robot;
use MartianRobot\Provider\Direction\DirectionInterface;
use MartianRobot\Provider\Direction\EastDirection;
use MartianRobot\Provider\Instruction\ForwardInstruction;
use MartianRobot\Service\Maps\CoordinateFinder;
use MartianRobot\Service\Maps\GridMap;
use MartianRobot\Service\Maps\MapInterface;
use PHPUnit\Framework\TestCase;

class ForwardInstructionTest extends TestCase
{
    /**
     * @var ForwardInstruction
     */
    private $instruction;

    /**
     * @var CoordinateFinder
     */
    private $coordinateFinder;

    protected function setUp(): void
    {
        $this->coordinateFinder = new CoordinateFinder();
        $this->instruction = new ForwardInstruction($this->coordinateFinder);
    }

    /**
     * @param MapInterface $map
     * @param Robot $robot
     * @param DirectionInterface $direction
     * @param array $location
     * @param array $expected
     * @dataProvider canInstructRobotDataProvider
     */
    public function testCanInstructRobot(
        MapInterface $map,
        Robot $robot,
        DirectionInterface $direction,
        array $location,
        array $expected
    ) {
        $this->coordinateFinder->setMap($map);
        $this->coordinateFinder->setCoordinate($location['x'], $location['y']);

        $robot->setDirection($location['direction'])
            ->setCoordinate($this->coordinateFinder->getCoordinate())
            ->setTargetCoordinate($this->coordinateFinder->getCoordinate());

        $this->instruction->action($robot, $direction);
        $this->assertEquals($expected['x'], $robot->getCoordinate()->getX());
        $this->assertEquals($expected['y'], $robot->getCoordinate()->getY());
    }

    public function canInstructRobotDataProvider()
    {
        $location = ['x' => 1, 'y' => 1, 'direction' => 'E'];
        return [
            'canMoveForward' => [
                'map' => new GridMap(5, 3),
                'robot' => new Robot(),
                'direction' => new EastDirection(),
                'location' => $location,
                'expected' => ['x' => 2, 'y' => 1],
            ]
        ];
    }
}