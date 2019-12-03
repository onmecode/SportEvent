<?php
namespace test\unit;
use Event\BasicEvent;
use phpDocumentor\Reflection\Types\Array_;
use PHPUnit\Framework\TestCase;
include '/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json';
include '/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/BasicEvent.php';

class BasicEventTest extends TestCase
{
    public $data = '/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json';

    //Getters
    public function testgetSport() {
        //checking whether $this->sport is a string
        $instance = new BasicEvent($this->data);
        $getSport_method = $instance->getSport($this->data);
        $this->assertIsString($getSport_method);
    }

    public function testgetEventType() {
        //checking whether $this->eventType is a string
        $instance = new BasicEvent($this->data);
        $getEventType_method = $instance->getEventType($this->data);
        $this->assertIsString($getEventType_method);
    }

    public function testgetIsStorable(){
        //checking whether $this->isStorable is a boolean
        $instance = new BasicEvent($this->data);
        $getIsStorable_method = $instance->getIsStorable($this->data);
        $this->assertIsBool($getIsStorable_method);

    }

    //Methods

    public function testreadData(): void
    {
        //tests whether the file exists
        $this->assertFileExists($this->data);
        //checks whether specified file is equal to the one used to instantiate the class
        $this->assertFileEquals('/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json', $this->data);

        //checking whether $dataResponse is an array
        $instance = new BasicEvent($this->data);
        $readData_method = $instance->readData($this->data);
        $this->assertIsArray($readData_method);
        //checking whether $dataResponse is not empty
        $this->assertNotEmpty($readData_method);
    }

    public function testgetDataSport() :void
    {
        //checking whether $this->sport is a string
        $instance = new BasicEvent($this->data);
        $getDataSport_method = $instance->getDataSport($this->data);
        $this->assertIsString($getDataSport_method);
    }

    public function testgetDataEventType() :void
    {
        //checking whether $this->eventType is a string
        $instance = new BasicEvent($this->data);
        $getDataEventType_method = $instance->getDataEventType($this->data);
        $this->assertIsString($getDataEventType_method);
    }


    public function teststorable() : void
    {
        //checking whether the output is a boolean
        $instance = new BasicEvent($this->data);
        $storable_method = $instance->storable();
        $this->assertIsBool($storable_method);

        $football = "football";
        $tennis = "tennis";
        $football_event = "goal";
        $tennis_event = "matchpoint";
        $other_event = "wrong_event";

        //A football event is present in football
        $this->assertEquals(true, (in_array($football_event, selectSportEvents($football))));
        //A football event is not present in another sport
        $this->assertEquals(false, (in_array($football_event, selectSportEvents($tennis))));
        //A non-football event is not present in football
        $this->assertEquals(false, (in_array($tennis_event, selectSportEvents($football))));
        //The wrong event is not present in football
        $this->assertEquals(false, (in_array($other_event, selectSportEvents($football))));

    }

}
?>