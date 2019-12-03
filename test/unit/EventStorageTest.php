<?php

namespace test\unit;
use Event\BasicEvent;
use Event\EventStorage;
use phpDocumentor\Reflection\Types\Array_;
use PHPUnit\Framework\TestCase;
include '/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json';
include '/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/EventStorage.php';


class EventStorageTest extends TestCase{

    public $data = '/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json';

    //Getters

    public function testgetisStorable() {
        //checking whether $this->sport is a string
        $instance = new BasicEvent($this->data);
        $getisStorable_method = $instance->getisStorable($this->data);
        $this->assertIsBool($getisStorable_method);
    }

    //Methods

    public function teststore() : void
    {
        //tests whether the file exists
        $this->assertFileExists($this->data);
        //checks whether specified file is equal to the one used to instantiate the class
        $this->assertFileEquals('/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json', $this->data);


        //testing whether the output of store is boolean
        $basic_event_instance = new BasicEvent($this->data);

        $event_storage_instance = new EventStorage($basic_event_instance,$this->data);
        $store_method = $event_storage_instance->store($this->data);
        $this->assertIsBool($store_method);

        //testing whether the data.json is created
        $isStorable_true = true;
        $isStorable_false = false;
        $this->assertEquals(file_exists('/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json'),$isStorable_false);
        $this->assertEquals(file_exists('/Users/Ema/VirtualMachines/June/www/EmaEvent/src/Event/event.json'),$isStorable_true);


    }


}
