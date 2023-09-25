<?php

declare(strict_types=1);

namespace CalculatorViaMagic\Operations;

use CalculatorViaMagic\Exceptions\OperationNotFound;

final class Factory
{
    private const OPERATIONS_NAMESPACE = __NAMESPACE__;

    private const OPERATIONS = [
        'addition' => ['addition', 'add'],
        'subtraction' => ['subtraction', 'sub'],
        'multiplication' => ['multiplication', 'mult', 'multiply'],
        'division' => ['division', 'div', 'divide'],
    ];

    /**
     * @param string $name
     * @return Operation
     *
     * @throws OperationNotFound
     */
    public static function create(string $name): Operation
    {
        $className = self::findOperationClass($name);
        $fullName = self::OPERATIONS_NAMESPACE . '\\' . $className;

        return new $fullName();
    }

    private static function findOperationClass(string $requestedOperation): string
    {
        foreach (self::OPERATIONS as $name => $validOperations) {
            if (in_array($requestedOperation, $validOperations, true)) {
                return ucfirst($name);
            }
        }

        throw new OperationNotFound(
            sprintf('The requested operation %s was not found.', $requestedOperation)
        );
    }
}
