<?php

namespace CalculatorViaMagicMethod\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaMagicMethod\Operations\Subtraction;

class SubtractionTest extends TestCase
{
    /**
     * Exceptions.
     */

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $addition = new Subtraction(12, -20);

        $this->assertSame(32, $addition->calculate());
    }

    /**
     * Functionality.
     */
    public function testCalculateReturnExpectedWhenInputIsValid()
    {
        $operation = new Subtraction(22, 12);

        $this->assertSame(10, $operation->calculate());
    }
}
