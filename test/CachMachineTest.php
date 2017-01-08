<?php
use PHPUnit\Framework\TestCase;

include '../src/CachMachine.php';
/**
 * Test Class CachMachineTest
 */
class CachMachineTest extends TestCase
{
    public function testDeliverNote()
    {
        $cacheMachine =  new CachMachine();
        $this->assertSame(array(20, 10), $cacheMachine->deliverNote(30));
        $this->assertSame(array(50, 20, 10), $cacheMachine->deliverNote(80));
        $this->assertSame(array(100,100, 50, 20, 10), $cacheMachine->deliverNote(280));
    }

    public function testDeliverNoteForNull()
    {
        $cacheMachine =  new CachMachine();
        $this->assertSame(array(), $cacheMachine->deliverNote(null));
    }

    /**
     * Test using exception annotation
     * @expectedException \Exception
     */
    public function testDeliverNoteInvalidArgumentException()
    {
        (new CachMachine())->deliverNote(-130);
    }

    /** Test using exception annotation and annotation message
     *
     * @expectedException        \Exception
     * @expectedExceptionMessage NoteUnavailableException
     */
    public function testDeliverNoteUnavailableException()
    {
        (new CachMachine())->deliverNote(125);
    }
}

