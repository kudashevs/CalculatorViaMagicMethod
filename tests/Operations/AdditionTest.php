<?php

namespace CalculatorViaMagicMethod\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaMagicMethod\Operations\Addition;

class AdditionTest extends TestCase
{
    /**
     * Exceptions.
     */

    /**
     * Corner cases.
     */
    public function testCalculateReturnExpectedWhenInputContainsNegative()
    {
        $operation = new Addition(12, -20);

        $this->assertSame(-8, $operation->calculate());
    }

    /**
     * Functionality.
     */
    public function testCalculateReturnExpectedWhenInputIsValid()
    {
        $operation = new Addition(12, 20);

        $this->assertSame(32, $operation->calculate());
    }
}
