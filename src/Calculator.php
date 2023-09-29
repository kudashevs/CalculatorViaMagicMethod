<?php

declare(strict_types=1);

namespace CalculatorViaMagic;

use BadMethodCallException;
use CalculatorViaMagic\Exceptions\OperationNotFound;
use CalculatorViaMagic\Operations\Factory;

/**
 * @todo don't forget to update these method signatures
 *
 * @method int|float add(int|float ...$numbers)
 * @method int|float addition(int|float ...$numbers)
 * @method int|float sub(int|float ...$numbers)
 * @method int|float subtraction(int|float ...$numbers)
 * @method int|float mult(int|float ...$numbers)
 * @method int|float multiply(int|float ...$numbers)
 * @method int|float multiplication(int|float ...$numbers)
 * @method int|float div(int|float ...$numbers)
 * @method int|float divide(int|float ...$numbers)
 * @method int|float division(int|float ...$numbers)
 */
class Calculator
{
    /**
     * Find an operation by the name of a method being called and if an operation exists,
     * perform calculations by invoking the operation's method with the passed arguments.
     *
     * @param string $name
     * @param array<int|float> $arguments
     * @return int|float
     *
     * @throws BadMethodCallException
     */
    public function __call(string $name, array $arguments)
    {
        try {
            $operation = Factory::create($name);
        } catch (OperationNotFound $e) {
            throw new BadMethodCallException(
                sprintf('Method %s was not found. Check the method name.', $name)
            );
        }

        return $operation->calculate(...$arguments);
    }
}
