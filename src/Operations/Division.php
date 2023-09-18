<?php

namespace CalculatorViaMagicMethod\Operations;

use CalculatorViaMagicMethod\Exceptions\InvalidOperationArgument;

class Division extends Operation
{
    /**
     * @inheritDoc
     */
    public function performCalculation(...$numbers)
    {
        $result = array_shift($numbers);

        foreach ($numbers as $number) {
            $result /= $number;
        }

        return $result;
    }

    protected function validate(array $numbers): void
    {
        parent::validate($numbers);

        if (in_array(0, $numbers, false)) {
            throw new InvalidOperationArgument('Cannot divide by zero.');
        }
    }
}
