<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Operations\Division;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    public function testConstructorThrowExceptionWhenEmptyArguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('at least');

        $division = new Division();
        $division->calculate();
    }

    public function testConstructorThrowExceptionWhenNonNumeric()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('allowed');

        $division = new Division(22, '42');
        $division->calculate(42, 'wrong');
    }

    public function testConstructorThrowExceptionWhenContainsZero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('divide by');

        $division = new Division();
        $division->calculate(22, 10, 0);
    }

    /**
     * @dataProvider provideData
     */
    public function testCalculateReturnExpected($expected, array $data)
    {
        $operation = new Division();

        $this->assertSame($expected, $operation->calculate(...$data));
    }

    public function provideData(): array
    {
        return [
            'Valid integers' => [11, [22, 2]],
            'Valid floats' => [3.2758620689655173, [47.5, 14.5]],
            'Valid integer and float' => [3.0003000300030, [10, 3.333]],
        ];
    }
}
