<?php

namespace CalculatorViaMagicMethod\Tests;

use PHPUnit\Framework\TestCase;
use CalculatorViaMagicMethod\Operations\Addition;

class OperationTest extends TestCase
{
    /**
     * Exceptions.
     */
    public function testConstructorThrowExceptionWhenEmptyArguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/^No arguments were passed. Check/');

        new Addition();
    }

    public function testConstructorThrowExceptionWhenNonNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/^Argument value 42 is not valid. Check/');

        new Addition(22, '42');
    }

    // Corner cases.

    // Functionality.
}
