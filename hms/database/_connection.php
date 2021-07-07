<?php
class DBFactory {
    public $DBHandler;
    function __construct()
    {
        $this->DBHandler=new PDO('mysql:host=127.0.0.1;dbname=jayesh', 'jayesh', 'jayesh');
        $this->DBHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }   
}
