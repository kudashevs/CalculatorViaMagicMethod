<?php

namespace CalculatorViaMagicMethod\Operations;

class Division extends Operation
{
    protected function validate(array $numbers): void
    {
        parent::validate($numbers);

        if (in_array(0, $numbers, false)) {
            throw new \InvalidArgumentException('Cannot divide by zero.');
        }
    }

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
}
