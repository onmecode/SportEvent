<?php

namespace Event;

class EventStorage {
    public $event;
    public $data;
    public $eventType;
    public $sport;
    public $isStorable;
    public $stored;


    public function  __construct(BasicEvent $event, $data)
    {
        $this->event = $event;
        $this->data = $data;
        $this->isStorable = $event->isStorable;
    }

    /**
     * @return bool
     */
    public function getisStorable()
    {
        return $this->isStorable;
    }

    /**
     * Stores an event
     * @param  $event
     * @return bool
     */
    public function store($data) {
        if($this->isStorable == true) {
            $encode = json_encode($data);
            file_put_contents("data.json", $encode);
            return true;
        }
    }
}


