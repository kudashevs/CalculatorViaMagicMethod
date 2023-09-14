<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Division;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    public function testConstructorThrowExceptionWhenEmptyArguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/^No arguments were passed. Check/');

        new Division();
    }

    public function testConstructorThrowExceptionWhenNonNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('/^Argument value 42 is not valid. Check/');

        new Division(22, '42');
    }

    public function testConstructorThrowExceptionWhenContainsZero()
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->expectExceptionMessageMatches('/^The value 0 is not valid for the division. Check/');

        new Division(22, 10, 0);
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, $data)
    {
        $operation = new Division(...$data);

        $this->assertSame($expected, $operation->calculate());
    }

    public function provideData()
    {
        return [
            'Valid integers' => [11, [22, 2]],
            'Valid floats' => [3.2758620689655173, [47.5, 14.5]],
            'Valid integer and float' => [3.0003000300030, [10, 3.333]],
        ];
    }
}
