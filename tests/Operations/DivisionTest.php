<?php

namespace CalculatorViaMagicMethod\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaMagicMethod\Operations\Division;

class DivisionTest extends TestCase
{
    /**
     * Exceptions.
     */
    public function testConstructorThrowExceptionWhenEmptyArguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp('/^No arguments were passed. Check/');

        new Division();
    }

    public function testConstructorThrowExceptionWhenNonNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp('/^Argument value 42 is not valid. Check/');

        new Division(22, '42');
    }

    public function testConstructorThrowExceptionWhenContainsZero()
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->expectExceptionMessageRegExp('/^The value 0 is not valid for the division. Check/');

        new Division(22, 10, 0);
    }

    /**
     * Corner cases.
     */

    /**
     * Functionality.
     */
    public function testCalculateReturnExpectedWhenInputIsValid()
    {
        $operation = new Division(22, 2);

        $this->assertSame(11, $operation->calculate());
    }
}
