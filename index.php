<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use MartianRobot\Entity\Robot;
use MartianRobot\Provider\Direction\DirectionProvider;
use MartianRobot\Provider\Direction\EastDirection;
use MartianRobot\Provider\Direction\NorthDirection;
use MartianRobot\Provider\Direction\SouthDirection;
use MartianRobot\Provider\Direction\WestDirection;
use MartianRobot\Provider\Instruction\ForwardInstruction;
use MartianRobot\Provider\Instruction\InstructionProvider;
use MartianRobot\Provider\Instruction\TurnLeftInstruction;
use MartianRobot\Provider\Instruction\TurnRightInstruction;
use MartianRobot\Service\Maps\CoordinateFinder;
use MartianRobot\Service\Maps\GridMap;
use MartianRobot\Service\Renderer\StdOutRenderer;
use MartianRobot\Service\Robot\InstructRobot;

$inputs = [
    'grid' => [ 'x' => 5, 'y' => 3],
    'robots' => [
        [
            'location' => ['x' => 1, 'y' => 1, 'direction' => 'E'],
            'instruction' => ['R', 'F', 'R', 'F', 'R', 'F', 'R', 'F', ]
        ],
        [
            'location' => ['x' => 3, 'y' => 2, 'direction' => 'N'],
            'instruction' => ['F', 'R', 'R', 'F', 'L', 'L', 'F', 'F', 'R', 'R', 'F', 'L', 'L']
        ],
        [
            'location' => ['x' => 0, 'y' => 3, 'direction' => 'W'],
            'instruction' => ['F', 'F', 'F']
        ],
        [
            'location' => ['x' => 0, 'y' => 2, 'direction' => 'S'],
            'instruction' => ['L', 'L', 'F', 'F', 'F', 'L', 'F', 'L', 'F', 'L' ]
        ],
    ]
];

$gridX = $inputs['grid']['x'];
$gridY = $inputs['grid']['y'];

$gridMapCoordinates = new GridMap($gridX, $gridY);
$coordinateFinder = new CoordinateFinder();
$coordinateFinder->setMap($gridMapCoordinates);

$directionProvider = new DirectionProvider();
$directionProvider->addProvider(new NorthDirection(), 'N');
$directionProvider->addProvider(new SouthDirection(), 'S');
$directionProvider->addProvider(new EastDirection(), 'E');
$directionProvider->addProvider(new WestDirection(), 'W');

$instructionProvider = new InstructionProvider();
$instructionProvider->addProvider(new ForwardInstruction($coordinateFinder), 'F');
$instructionProvider->addProvider(new TurnRightInstruction($coordinateFinder), 'R');
$instructionProvider->addProvider(new TurnLeftInstruction($coordinateFinder), 'L');


foreach ($inputs['robots'] as $robotData) {
    $currentX = $robotData['location']['x'];
    $currentY = $robotData['location']['y'];
    $coordinateFinder->setCoordinate($currentX, $currentY);

    try {
        $robot = (new Robot())
            ->setDirection($robotData['location']['direction'])
            ->setCoordinate($coordinateFinder->getCoordinate())
            ->setTargetCoordinate($coordinateFinder->getCoordinate())
        ;

        $renderer = new StdOutRenderer($robot);
    } catch (Exception $e) {
        die($e->getMessage());
    }

    foreach ($robotData['instruction'] as $robotInstructionInitial) {
        $robotInstruction = new InstructRobot(
            $robot,
            $instructionProvider->provide($robotInstructionInitial),
            $directionProvider->provide($robot->getDirection())
        );
        $robotInstruction->execute();
    }
    $renderer->render();
}
