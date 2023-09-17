<?php

namespace CalculatorViaMagicMethod\Operations;

abstract class Operation
{
    /**
     * @param int|float ...$arguments
     * @return int|float
     */
    abstract protected function performCalculation(...$arguments);

    /**
     * @param int|float ...$arguments
     * @return float|int
     */
    final public function calculate(...$arguments)
    {
        $this->validate($arguments);

        return $this->performCalculation(...$arguments);
    }

    /**
     * @param array $arguments
     *
     * @throws \InvalidArgumentException
     */
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
