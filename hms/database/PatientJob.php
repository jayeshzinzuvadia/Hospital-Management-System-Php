<?php

require("Doctor.php");
require("Patient.php");
require("AppointmentCase.php");
require("_connection.php");

class PatientJob {

    public static function getInstance() {
        if (!isset($_SESSION['PatientJob'])) {
            $_SESSION['PatientJob'] = serialize(new self());
        }
        return unserialize($_SESSION['PatientJob']);
    }

    public function getAppointment($p_email, $status) {
        $list = new SplDoublyLinkedList();

        $patient = self::getPatient($p_email);

        $handler = (new DBFactory())->DBHandler;
        $pquery = $handler->prepare("select * from patientcomplaint where p_email=? and status=?");
        $pquery->execute(array($p_email, $status));

        while ($r = $pquery->fetch(PDO::FETCH_ASSOC)) {
            $doctor = self::getDoctor($r['d_email']);

            $obj = new AppointmentCase($patient, $doctor, $r['chief_complaint']
                    , $r['prescription'], $r['description'], $r['appointmenttime']
                    ,$r['case_id']);
            $list->push($obj);
        }
        return $list;
    }

    public function getDoctorList() {
        $handler = (new DBFactory())->DBHandler;
        $pquery = $handler->prepare("select * from doctor");
        $pquery->execute();
        $list = new SplDoublyLinkedList();
        while ($r = $pquery->fetch(PDO::FETCH_ASSOC)) {
            $obj = new Doctor($r['name'], $r['imageurl'], $r['d_email'], $r['phoneno'], $r['hospitaladdress'], $r['password'], $r['gender'], $r['birthdate'], $r['typeofdoctor'], $r['degree']);
            $list->push($obj);
        }
        return $list;
    }

    public function getDoctor($d_email) {
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("select * from doctor where d_email=? ");
        $pquery1->execute(array($d_email));
        $r1 = $pquery1->fetch(PDO::FETCH_ASSOC);
        $doctor = new Doctor();

        if ($r1) {
            $doctor = new Doctor($r1['name'], $r1['imageurl'], $r1['d_email'], $r1['phoneno'], $r1['hospitaladdress'], $r1['password'], $r1['gender'], $r1['birthdate'], $r1['typeofdoctor'], $r1['degree']);
        }
        return $doctor;
    }

    public function getPatient($p_email) {
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("select * from patient where p_email=? ");
        $pquery1->execute(array($p_email));
        $r1 = $pquery1->fetch(PDO::FETCH_ASSOC);
        $patient = new Patient();
        if ($r1) {
            $patient = new Patient($r1['name'], $r1['imageurl'], $r1['p_email'], $r1['phoneno'], $r1['address'], $r1['password'], $r1['gender'], $r1['birthdate']);
        }
        return $patient;
    }

    public function updatePatient($p_email, $address, $phoneno, $imgnamehtml) {
        $imageurl = "images/" . $p_email . ".JPG";
        if (!empty($_FILES[$imgnamehtml]["name"])) {
            $target_location = "images/" . basename($_FILES["img"]["name"]);
            $ext = pathinfo($target_location, PATHINFO_EXTENSION);
            if (!(move_uploaded_file($_FILES[$imgnamehtml]["tmp_name"], $target_location))) {
                echo "Error: " . $_FILES[$imgnamehtml]["error"] . "<br>";
            } else {
                rename($target_location, $imageurl);
            }
        }
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("update patient "
                . " set address=?,phoneno=?,imageurl=? "
                . " where p_email=? ");
        $pquery1->execute(array($address, $phoneno, $imageurl, $p_email));
    }

    public function createAppointment($p_email,$d_email,$chiefcomplaint,$description)
    {
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("insert into patientcomplaint (p_email,d_email,chief_complaint,"
                . "description,status)"
                . "values(?,?,?,?,?)");
        
        $pquery1->execute(array($p_email, $d_email, $chiefcomplaint,$description,'pending'));
    }
    
    public function deleteComplaint($case_id)
    {
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("delete from patientcomplaint where case_id = ? ");
        
        $pquery1->execute(array($case_id));
    }

    public function __sleep() {
        return array();
    }

    public function __wakeup() {
        
    }

}
