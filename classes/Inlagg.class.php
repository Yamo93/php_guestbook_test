<?php

class Inlagg {

    protected $name = '';
    protected $msg = '';
    protected $date = '';

    function __construct ($name, $msg, $date) {
        $this->name = $name;
        $this->msg = $msg;
        $this->date = $date;
    }
}

?>