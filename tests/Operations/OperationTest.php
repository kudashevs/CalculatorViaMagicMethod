<?php

namespace CalculatorViaMagicMethod\Tests\Operations;

use CalculatorViaMagicMethod\Exceptions\InvalidOperationArgument;
use CalculatorViaMagicMethod\Operations\Operation;
use PHPUnit\Framework\TestCase;

class OperationTest extends TestCase
{
    private Operation $service;

    protected function setUp(): void
    {
        $this->service = new class extends Operation {
            public function check(...$arguments)
            {
                return $this->validate($arguments);
            }

            protected function performCalculation(...$arguments)
            {
                throw new \LogicException('The method is not supposed to be used in this test.');
            }
        };
    }

    /** @test */
    public function it_can_throw_an_exception_when_no_arguments_provided()
    {
        $this->expectException(InvalidOperationArgument::class);
        $this->expectExceptionMessage('at least');

        $this->service->check();
    }

    /** @test */
    public function it_can_throw_an_exception_when_an_argument_of_a_wrong_type()
    {
        $this->expectException(InvalidOperationArgument::class);
        $this->expectExceptionMessage('numeric');

        $this->service->check(42, 'wrong');
    }
}
