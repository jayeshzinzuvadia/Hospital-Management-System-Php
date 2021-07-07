<?php

class Doctor {
    private $name, $phno, $imgurl, $address, $passwd,
            $gender, $birthdate, $email,$type,$degree;
    public function __toString() {
        return "{".$this->name.",".$this->phno.",".$this->gender.",".$this->address.",".$this->email.","."}";
    }

    function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 10:
                self::__construct1($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],
                        $argv[5],$argv[6],$argv[7],$argv[8],$argv[9]);
        }
       // echo "Inside Doctor ".$this->phno;
    }

    function __construct1($name, $imgurl, $email, $phno, $address, $passwd, $gender, $birthdate,$type,$degree) {
        
        $this->name = $name;
        $this->phno = $phno;
        $this->imgurl = $imgurl;
        $this->address = $address;
        $this->passwd = $passwd;
        $this->gender = $gender;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->type=$type;
        $this->degree=$degree;
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
    
    function getType() {
        return $this->type;
    }

    function getDegree() {
        return $this->degree;
    }


}
