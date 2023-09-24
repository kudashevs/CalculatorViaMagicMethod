<?php

namespace CalculatorViaMagic;

use CalculatorViaMagic\Operations\Factory;

class Calculator
{
    /**
     * Find an operation by the incoming method name and if an operation
     * exists, perform calculations by passing arguments to the operation.
     *
     * @param string $name
     * @param array $arguments
     * @return int|float
     */
    public function __call(string $name, array $arguments)
    {
        try {
            $operation = Factory::create($name);
        } catch (\ErrorException $e) {
            throw new \BadMethodCallException(
                sprintf('Method %s was not found. Check the method name.', $name)
            );
        }

        return $operation->calculate(...$arguments);
    }
}
