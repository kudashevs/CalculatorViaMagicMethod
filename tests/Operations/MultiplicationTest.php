<?php

namespace CalculatorViaMagicMethod\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaMagicMethod\Operations\Multiplication;

class MultiplicationTest extends TestCase
{
    /**
     * Exceptions.
     */

    /**
     * Corner cases.
     */
//    public function testCalculateReturnExpectedWhenInputContainsNegative()
//    {
//        $addition = new Addition(12, -20);
//
//        $this->assertSame(-8, $addition->calculate());
//    }

    /**
     * Functionality.
     */
    public function testCalculateReturnExpectedWhenInputContainsZero()
    {
        $operation = new Multiplication(22, 12, 0);

        $this->assertSame(0, $operation->calculate());
    }

    public function testCalculateReturnExpectedWhenInputIsValid()
    {
        $operation = new Multiplication(22, 5);

        $this->assertSame(110, $operation->calculate());
    }
}
