<?php

Class Lamp extends Connection{

    protected $id;
    protected $name;
    protected $model;
    private $zone;
    private $status;




    function __construct($id ,$model, $name, $zone, $status){

        $this->id = $id;
        $this->name = $name; 
        $this->model = $model;
        $this->zone = $zone;
        $this->status = $status;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    } 
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function setmodel($model) {
        $this->model = $model;
        return $this;
    }
    public function setPot($pot) {
        $this->pot = $pot;
        return $this;
    }
    public function setzone($zone) {
        $this->zone = $zone;
        return $this;
    }
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }



    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getmodel() {
        return $this->model;
    }
    public function getzone() {
        return $this->zone;
    }
    public function getStatus() {
        return $this->status;
    }
}