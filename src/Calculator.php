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
        $operation = new $fullName();
        $this->result = $operation->calculate(...$arguments);

        return $this->result();
    }

    /**
     * @param string $operation
     * @return string
     *
     * @throws \BadMethodCallException
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

        throw new \BadMethodCallException(
            sprintf('Method %s was not found. Check the method name.', $operation)
        );
    }

    /**
     * @return float|int
     */
    public function result()
    {
        return $this->convertZeroTrailingToInteger($this->result);
    }

    /**
     * Return int if float is with trailing .0.
     *
     * @param float|int $number
     * @return float|int
     */
    protected function convertZeroTrailingToInteger($number)
    {
        if (($number - floor($number)) === 0.0) {
            $number = (int)$number;
        }

        return $number;
    }

    /**
     * Reset calculator state to 0.
     */
    public function reset(): void
    {
        $this->result = 0;
    }
}
