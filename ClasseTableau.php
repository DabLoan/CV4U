<?php

class Tableau{

    private $data;
    private $photo;

    function __construct($data,$photo)
    {
        $this->data = $data;
        $this->photo = $photo;
    }

    function transmettreDonnees(){
        return array($this->data,$this->photo);
    }
}