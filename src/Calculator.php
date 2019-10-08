<?php

namespace CalculatorViaMagicMethod;

use CalculatorViaMagicMethod\Operations\Operation;

class Calculator
{
    private const OPERATION_NAMESPACE = __NAMESPACE__ . '\Operations\\';

    /**
     * @var float|int
     */
    private $result = 0;

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
        $operation = new $fullName(...$arguments);
        $this->result = $operation->calculate();

        return $this->result();
    }

    /**
     * @param string $operation
     * @throws \BadMethodCallException
     * @return string
     */
    private function findOperation(string $operation): string
    {
        $operations = [
            'addition' => ['add', 'addition'],
            'subtraction' => ['sub', 'subtraction'],
            'multiplication' => ['mult', 'multiply', 'multiplication'],
            'division' => ['div', 'divide', 'division'],
        ];

        foreach ($operations as $name => $possible) {
            if (in_array($operation, $possible, true)) {
                return ucfirst($name);
            }
        }

        throw new \BadMethodCallException('Method with ' . $operation . ' was not found. Check method name');
    }

    /**
     * @return float|int
     */
    public function result()
    {
        return $this->result;
    }

    /**
     * Reset calculator state to 0.
     */
    public function reset(): void
    {
        $this->result = 0;
    }
}
