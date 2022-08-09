<?php
namespace Tddbc;

use PHPUnit\Framework\TestCase;
use Tddbc\VendingMachine;

/**
 * @testdox 
 */
class VendingMachineTest extends TestCase
{
    /**
     * @var VendingMachine
     */
    protected $sut;

    /**
     * {@inheritdoc}
     */
    protected function setUp() : void
    {
        $this->sut = new VendingMachine();
    }

    /**
     * @test
     * @testdox check exported Class
     */
    public function testExportedClass()
    {
        $this->assertEquals('Tddbc\VendingMachine', get_class($this->sut));
        $this->assertEquals(0, $this->sut->total);
    }

    /**
     * @test
     * @testdox check input
     */
    public function testInput()
    {
	$this->sut->input(10);
        $this->assertEquals(10, $this->sut->total);
    }

    /**
     * @test
     * @testdox check refund
     */
    public function testRefund()
    {
	$this->sut->input(10);
	$this->sut->input(50);
	$this->sut->input(100);
	$this->sut->input(500);
        $this->assertEquals(660, $this->sut->refund());
        $this->assertEquals(0, $this->sut->total);
    }

    /**
     * @test
     * @testdox check input exception
     */
    public function testInputException()
    {
	$this->expectException(\Exception::class);
	$this->sut->input(-1);
    }
}
