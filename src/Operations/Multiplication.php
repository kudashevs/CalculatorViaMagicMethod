<?php

namespace CalculatorViaMagicMethod\Operations;

class Multiplication extends Operation
{
    public function calculate()
    {
        if (in_array(0, $this->numbers, true)) {
            return 0;
        }

        $result = array_shift($this->numbers);

        foreach ($this->numbers as $number) {
            $result *= $number;
        }

        return $result;
    }
}
