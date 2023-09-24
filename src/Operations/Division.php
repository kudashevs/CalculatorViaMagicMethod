<?php

declare(strict_types=1);

namespace CalculatorViaMagic\Operations;

use CalculatorViaMagic\Exceptions\InvalidOperationArgument;

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

    /**
     * @inheritDoc
     */
    protected function validate(...$arguments): void
    {
        parent::validate(...$arguments);

        if (in_array(0, $arguments, false)) {
            throw new InvalidOperationArgument('Cannot divide by zero.');
        }
    }
}
