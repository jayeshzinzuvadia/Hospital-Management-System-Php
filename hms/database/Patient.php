<?php

class Patient {

    private $name, $phno, $imgurl, $address, $passwd, $gender, $birthdate, $email;
    public function __toString() {
        return "{".$this->name.",".$this->phno.",".$this->gender.",".$this->address.",".$this->email.","."}";
    }

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 8:
                self::__construct1($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],
                        $argv[5],$argv[6],$argv[7]);
        }
    }

    function __construct1($name, $imgurl, $email, $phno, $address, $passwd, $gender, $birthdate) {
        
        $this->name = $name;
        $this->phno = $phno;
        $this->imgurl = $imgurl;
        $this->address = $address;
        $this->passwd = $passwd;
        $this->gender = $gender;
        $this->birthdate = $birthdate;
        $this->email = $email;
    }
    function getName() {
        return $this->name;
    }

    function getPhno() {
        return $this->phno;
    }

    function getImgurl() {
        return $this->imgurl;
    }

    function getAddress() {
        return $this->address;
    }

    function getPasswd() {
        return $this->passwd;
    }

    function getGender() {
        return $this->gender;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function getEmail() {
        return $this->email;
    }


}
