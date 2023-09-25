<?php

namespace CalculatorViaMagic\Tests\Unit\Operations;

use CalculatorViaMagic\Exceptions\OperationNotFound;
use CalculatorViaMagic\Operations\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /** @test */
    public function it_can_throw_an_exception_when_an_unknown_operation()
    {
        $this->expectException(OperationNotFound::class);
        $this->expectExceptionMessage('not found');

        Factory::create('unknown');
    }

    /** @test */
    public function it_can_create_an_operation_by_name()
    {
        $operation = Factory::create('addition');

        $this->assertIsObject($operation);
    }

    /** @test */
    public function it_can_create_an_operation_by_alias()
    {
        $operation = Factory::create('add');

        $this->assertIsObject($operation);
    }
}
