<?php

namespace CalculatorViaMagicMethod\Operations;

class Division extends Operation
{
    public function __construct(...$arguments)
    {
        parent::__construct(...$arguments);

        if (in_array(0, $this->numbers, true)) {
            throw new \DivisionByZeroError('The value 0 is not valid for the division. Check input arguments.');
        }
    }

    public function calculate()
    {
        $result = array_shift($this->numbers);

        foreach ($this->numbers as $number) {
            $result /= $number;
        }

        return $result;
    }
}
