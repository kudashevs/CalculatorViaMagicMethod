<?php

namespace CalculatorViaMagicMethod\Tests;

use CalculatorViaMagicMethod\Calculator;

class CalculatorTest extends ExtendedTestCase
{
    /**
     * @var Calculator
     */
    private $calc;

    public function setUp()
    {
        $this->calc = new Calculator();
    }

    /**
     * Exceptions.
     */
    public function testCalculatorThrowExceptionWhenMethodNotValid()
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessageRegExp('/^Method with not_exist was not found. Check/');

        $this->calc->not_exist();
    }

    public function testCalculatorThrowExpcetionWhenMethodLacksArguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp('/^No arguments were passed. Check/');

        $this->calc->add();
    }

    /**
     * Corner cases.
     */

    /**
     * Functionality.
     */
    public function testFindOperationReturnExpected()
    {
        $method = $this->getPrivateMethod($this->calc, 'findOperation');

        $this->assertEquals('Addition', $method->invokeArgs($this->calc, ['add']));
        $this->assertEquals('Addition', $method->invokeArgs($this->calc, ['addition']));
    }

    public function testResultReturnInitial()
    {
        $initial = 0;

        $this->assertSame($initial, (new Calculator())->result());
    }

    public function testAdditionReturnExpectedWhenEmptyState()
    {
        $this->calc->add(22);

        $this->assertSame(22, $this->calc->result());
    }

    public function testResetReturnExpected()
    {
        $this->calc->add(22);

        $this->assertSame(22, $this->calc->result());

        $this->calc->reset();

        $this->assertSame(0, $this->calc->result());
    }

    /**
     * @dataProvider provideDataConvertZeroTrailingToInteger
     */
    public function testConvertZeroTrailingToIntegerReturnExpected($expected, $value)
    {
        $method = $this->getPrivateMethod($this->calc, 'convertZeroTrailingToInteger');

        $this->assertSame($expected, $method->invokeArgs($this->calc, [$value]));
    }

    public function provideDataConvertZeroTrailingToInteger()
    {
        return [
            'Zero is untouched' => [0, 0],
            'Int is untouched' => [22, 22],
            'Trailing .0 to int' => [32, 32.0],
            'Trailing .something_and_0 to float' => [28.33, 28.330],
        ];
    }
}
