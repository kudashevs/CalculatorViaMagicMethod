<?php

namespace CalculatorViaMagicMethod\Operations;

abstract class Operation
{
    /**
     * @var array
     */
    protected $numbers = [];

    /**
     * @param mixed ...$arguments
     */
    public function __construct(...$arguments)
    {
        $this->validate($arguments);

        $this->numbers = $arguments;
    }

    /**
     * @return float|int
     */
    abstract public function calculate();

    protected function validate(array $arguments): void
    {
        if (count($arguments) === 0) {
            throw new \InvalidArgumentException('Please provide at least one argument.');
        }

        foreach ($arguments as $number) {
            if (!is_numeric($number)) {
                throw new \InvalidArgumentException('Only numeric arguments are allowed.');
            }
        }
    }
}
