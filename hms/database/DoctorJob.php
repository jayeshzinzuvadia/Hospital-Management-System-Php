<?php
require("Doctor.php");
require("Patient.php");
require("AppointmentCase.php");
require("_connection.php");
class DoctorJob {

    public static function getInstance() {
        if(!isset($_SESSION['DoctorJob']))
        {
            $_SESSION['DoctorJob']= serialize(new self());
        }
        return unserialize($_SESSION['DoctorJob']);
    }
   
    public function getAppointment($d_email,$status)
    {
        $list = new SplDoublyLinkedList();

        $doctor = self::getDoctor($d_email);
      
        $handler = (new DBFactory())->DBHandler;
        $pquery = $handler->prepare("select * from patientcomplaint where d_email=? and status=?");
        $pquery->execute(array($d_email, $status));
        
        while ($r = $pquery->fetch(PDO::FETCH_ASSOC)) {
            $patient = self::getPatient($r['p_email']);
            
            $obj = new AppointmentCase($patient, $doctor, $r['chief_complaint']
                    , $r['prescription'], $r['description'], $r['appointmenttime'],$r['case_id']);
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

    public function setPrescription($prec,$p_email,$d_email,$time)
    {
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("update patientcomplaint set prescription=?,status='checked' "
                                    . " where p_email=? and d_email=? and appointmenttime=?");
        $pquery1->execute(array($prec,$p_email,$d_email,$time));
    }
    
    public function cancelAppointment($case_id)
    {
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("update patientcomplaint set status='cancelled' "
                                    . " where case_id=?");
        $pquery1->execute(array($case_id));
    }

    public function updateDoctor($d_email, $address, $phoneno, $imgnamehtml) {
       $imageurl="images/".$d_email .".JPG";
       if (!empty($_FILES[$imgnamehtml]["name"])) {
            $target_location = "images/" . basename($_FILES["img"]["name"]);
            $ext = pathinfo($target_location, PATHINFO_EXTENSION);
            if (!(move_uploaded_file($_FILES[$imgnamehtml]["tmp_name"], $target_location))) 
            {
                echo "Error: " . $_FILES[$imgnamehtml]["error"] . "<br>";
            } else {
                rename($target_location, $imageurl);
            }
        }
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("update doctor "
                . " set hospitaladdress=?, phoneno=?,imageurl=? "
                . " where d_email=? ");
        $pquery1->execute(array($address,$phoneno,$imageurl,$d_email));
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
    public function setDateTime($case_id,$date,$time)
    {
        $datetime=$date." ".$time;
        //echo $datetime;
        $handler = (new DBFactory())->DBHandler;
        $pquery1 = $handler->prepare("update patientcomplaint set "
                        . "appointmenttime=?,status='confirmed' where case_id=? ");
        $pquery1->execute(array($datetime,$case_id));
    }
    
    public function __sleep()
    {
        return array();
    }
    public function __wakeup()
    {
    }
}