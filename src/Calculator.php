<?php

declare(strict_types=1);

namespace CalculatorViaMagic;

use CalculatorViaMagic\Exceptions\OperationNotFound;
use CalculatorViaMagic\Operations\Factory;

class Calculator
{
    /**
     * Find an operation by the name of a method being called and if an operation exists,
     * perform calculations by invoking the operation's method with the passed arguments.
     *
     * @param string $name
     * @param array $arguments
     * @return int|float
     *
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments)
    {
        try {
            $operation = Factory::create($name);
        } catch (OperationNotFound $e) {
            throw new \BadMethodCallException(
                sprintf('Method %s was not found. Check the method name.', $name)
            );
        }

        return $operation->calculate(...$arguments);
    }
}
