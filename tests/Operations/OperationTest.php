<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Addition;
use PHPUnit\Framework\TestCase;

class OperationTest extends TestCase
{
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
}
