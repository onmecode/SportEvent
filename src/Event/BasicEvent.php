<?php

namespace Event;

include "sports.php";
class BasicEvent {
    public $data;
    public $sport;
    public $eventType;
    public $isStorable;
    public $datastamp;

    /**
     * BasicEvent constructor.
     * @param $data
     */
    public function __construct($data) {
        $this->data = $data;
        $this->sport = $this->getDataSport($data);
        $this->eventType = $this->getDataEventType($data);
        $this->isStorable = $this->storable();
        $this->datastamp = $this->getDataStamp($data);
    }

    /**
     * @return mixed
     */
    public function getData() : mixed {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getSport() {
        return $this->sport;
    }

    /**
     * @return string
     */
    public function getEventType() {
        return $this->eventType;
    }

    /**
     * @return bool
     */
    public function getIsStorable(){
        return $this->isStorable;
    }


    /**
     * @return time
     */
    public function getDataStamp(){
        return $this->datastamp;
    }

    /**
     * @param $data
     * @return []
     */
    public function readData($data) {
       $json = file_get_contents($data);
       $dataResponse = json_decode($json, true);
       if(!empty($dataResponse)) {
           return $dataResponse;
       } else {
           die;
       }
    }

    /**
     * @param $data
     * @return string
     */
    public function getDataSport($data){
        $sport = "";
        $sportData = $this->readData($data);
        foreach ($sportData as $key1 => $value1) {
            $sport = $sportData[$key1]["sport"];
        }
        return $this->sport = $sport;
    }

    /**
     * @param $data
     * @return string
     */
    public function getDataEventType($data){
        $eventType = "";
        $sportData = $this->readData($data);
        foreach ($sportData as $key1 => $value1) {
            $eventType = $sportData[$key1]["eventType"];
        }
        return $this->eventType = $eventType;
    }

    /**
     * @return bool
     */
    public function storable () {
        $sport =  $this->sport;
        $eventType = $this->eventType;
        $sportEventType = selectSportEvents($sport);

        if(in_array($eventType, $sportEventType)){
            return true;
        } else {
            return false;
        }

    }

}