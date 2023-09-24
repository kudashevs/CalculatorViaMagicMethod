<?php

namespace CalculatorViaMagicMethod\Operations;

use CalculatorViaMagicMethod\Exceptions\InvalidOperationArgument;

abstract class Operation
{
    /**
     * @param int|float ...$numbers
     * @return int|float
     */
    abstract protected function performCalculation(...$numbers);

    /**
     * @param int|float ...$numbers
     * @return float|int
     *
     * @throws InvalidOperationArgument|\InvalidArgumentException
     */
    final public function calculate(...$numbers)
    {
        $this->validate($numbers);

        return $this->performCalculation(...$numbers);
    }

    /**
     * @param array $arguments
     *
     * @throws InvalidOperationArgument
     */
    protected function validate(array $arguments): void
    {
        if (count($arguments) === 0) {
            throw new InvalidOperationArgument('Please provide at least one argument.');
        }

        foreach ($arguments as $number) {
            if (!is_numeric($number)) {
                throw new InvalidOperationArgument('Only numeric arguments are allowed.');
            }
        }
    }
}
