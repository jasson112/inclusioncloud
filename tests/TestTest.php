<?php 
use Ubuntu\Inclusioncloud\Test;
use PHPUnit\Framework\TestCase;

final class TestTest extends TestCase
{
    public function testCodeForcesInput(): void
    {
        $test = Test::fromTestInput();
        $this->assertSame("12339,0,15,54306,999999995,185,999999998", $test->getResult());
    }
}