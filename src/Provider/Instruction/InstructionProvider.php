<?php


namespace MartianRobot\Provider\Instruction;


class InstructionProvider
{
    /**
     * @var array
     */
    private $provider;

    /**
     * @param InstructionInterface $instruction
     * @param string $key
     */
    public function addProvider(InstructionInterface $instruction, string $key): void
    {
        $this->provider[strtolower($key)] = $instruction;
    }

    /**
     * @param string $key
     * @return InstructionInterface
     */
    public function provide(string $key): InstructionInterface
    {
        return $this->provider[strtolower($key)];
    }
}