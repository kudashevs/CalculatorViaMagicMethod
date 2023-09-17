<?php

namespace CalculatorViaMagicMethod;

use CalculatorViaMagicMethod\Operations\Operation;

class Calculator
{
    private const OPERATION_NAMESPACE = __NAMESPACE__ . '\Operations\\';

    private const OPERATIONS = [
        'addition' => ['add', 'addition'],
        'subtraction' => ['sub', 'subtraction'],
        'multiplication' => ['mult', 'multiply', 'multiplication'],
        'division' => ['div', 'divide', 'division'],
    ];

    public function __construct()
    {
    }

    /**
     * Find valid method by name and calculate arguments.
     *
     * @param string $name
     * @param array $arguments
     * @return float|int
     */
    public function __call(string $name, $arguments = [])
    {
        $className = $this->findOperation($name);
        $fullName = self::OPERATION_NAMESPACE . $className;

        /** @var Operation $operation */
        $operation = new $fullName();

        return $operation->calculate(...$arguments);
    }

    /**
     * @param string $requestedOperation
     * @return string
     *
     * @throws \BadMethodCallException
     */
    private function findOperation(string $requestedOperation): string
    {
        foreach (self::OPERATIONS as $name => $validOperations) {
            if (in_array($requestedOperation, $validOperations, true)) {
                return ucfirst($name);
            }
        }

        throw new \BadMethodCallException(
            sprintf('Method %s was not found. Check the method name.', $requestedOperation)
        );
    }
}
