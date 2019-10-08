<?php

namespace CalculatorViaMagicMethod\Operations;

class Addition extends Operation
{
    public function calculate()
    {
        $result = 0;

        foreach ($this->numbers as $number) {
            $result += $number;
        }

        return $result;
    }
}
