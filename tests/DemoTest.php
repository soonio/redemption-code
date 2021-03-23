<?php

use PHPUnit\Framework\TestCase;
use soonio\rc\RedemptionCode;


final class DemoTest extends TestCase
{
    public array $chars = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G',
        'H', 'I', 'J', 'K', 'L', 'M', 'N',
        'O', 'P', 'Q', 'R', 'S', 'T', 'U',
        'V', 'W', 'X', 'Y', 'Z', '1', '2',
        '3', '4', '5', '6', '7', '8', '9'
    ];

    public string $code = '';

    public function __construct(string $name)
    {
        parent::__construct($name);
        shuffle($this->chars);
        $this->code = (new RedemptionCode($this->chars, 15))->generate();
    }

    public function testLength(): void
    {
        $this->assertEquals(15, strlen($this->code));
    }

    public function testVerifySuccess()
    {
        $this->assertTrue((new RedemptionCode($this->chars, 15))->verify($this->code));
    }

    public function testVerifyFailure()
    {
        $codes = str_split($this->code);
        shuffle($codes);
        $code = join($codes);
        $this->assertFalse((new RedemptionCode($this->chars, 15))->verify($code));
    }
}
