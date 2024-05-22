<?php

class Activity {
    public $activity;
    public $type;
    public $participants;
    public $price;
    public $key;

    public function __construct($data) {
        $this->activity = $data->activity;
        $this->type = $data->type;
        $this->participants = $data->participants;
        $this->price = $data->price;
        $this->key = $data->key;
    }
}