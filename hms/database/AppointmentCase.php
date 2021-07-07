<?php

class AppointmentCase {
   private $patient,$doctor,$caseid;
   private $chiefcomplaint,$prescription,$description,$time;
   
   function __construct() {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 7:
                self::__construct1($argv[0],$argv[1],$argv[2],
                        $argv[3],$argv[4],$argv[5],$argv[6]);
        }
    }
    function getCaseid() {
        return $this->caseid;
    }

        function getPatient() {
        return $this->patient;
    }

    function getDoctor() {
        return $this->doctor;
    }

    function getChiefcomplaint() {
        return $this->chiefcomplaint;
    }

    function getPrescription() {
        return $this->prescription;
    }

    function getDescription() {
        return $this->description;
    }

    function getTime() {
        return $this->time;
    }
    
    function __construct1(Patient $patient, Doctor $doctor,
            $chiefcomplaint,$prescription,$description,$time,$caseid) {
        if(!is_object($patient) or ! is_object($doctor))
        {return;}
        $this->patient=$patient;
        $this->doctor=$doctor;
        $this->chiefcomplaint=$chiefcomplaint;
        $this->prescription=$prescription;
        $this->description=$description;
        $this->time=$time;
        $this->caseid=$caseid;
    }
}
