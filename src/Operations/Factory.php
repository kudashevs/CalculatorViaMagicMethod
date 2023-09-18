<?php

declare(strict_types=1);

namespace CalculatorViaMagicMethod\Operations;

final class Factory
{
    private const OPERATIONS_NAMESPACE = __NAMESPACE__;

    private const OPERATIONS = [
        'addition' => ['add'],
        'subtraction' => ['sub'],
        'multiplication' => ['mult', 'multiply'],
        'division' => ['div', 'divide'],
    ];

    /**
     * @param string $name
     * @return Operation
     *
     * @throws \ErrorException
     */
    public static function create(string $name): Operation
    {
        $className = self::findOperationClass($name);
        $fullName = self::OPERATIONS_NAMESPACE . '\\' . $className;

        return new $fullName();
    }

    private static function findOperationClass(string $requestedOperation): string
    {
        // find an operation by its name
        if (array_key_exists($requestedOperation, self::OPERATIONS)) {
            return ucfirst($requestedOperation);
        }

        // find an operation by its alias
        foreach (self::OPERATIONS as $name => $validOperations) {
            if (in_array($requestedOperation, $validOperations, true)) {
                return ucfirst($name);
            }
        }

        throw new \ErrorException(
            sprintf('The requested operation %s was not found.', $requestedOperation)
        );
    }
}
