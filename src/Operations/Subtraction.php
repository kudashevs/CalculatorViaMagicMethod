<?php

namespace CalculatorViaMagicMethod\Operations;

class Subtraction extends Operation
{
    public function calculate()
    {
        $result = array_shift($this->numbers);

        foreach ($this->numbers as $number) {
            $result -= $number;
        }

        return $result;
    }
}
