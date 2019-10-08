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
        /*
         * The first argument is always the state of calculator.
         * The second argument and subsequent are method input.
         */
        if (empty($arguments)) {
            throw new \InvalidArgumentException('No arguments were passed. Check input arguments.');
        }

        foreach ($arguments as $number) {
            if (!is_int($number) && !is_float($number)) {
                throw new \InvalidArgumentException('Argument value ' . $number . ' is not valid. Check arguments.');
            }
        }

        $this->numbers = $arguments;
    }

    /**
     * @return float|int
     */
    abstract public function calculate();
}
