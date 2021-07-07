<?php
    require("../database/_connection.php");
    if(isset($_POST['save']))
    {
        $user=$_POST['user'];
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $phoneno=$_POST['phoneno'];
        $birthdate=$_POST['birthdate'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $initialpath="patient";
        $typeofdoctor="";
        $degree="";
        $imageurl="/images/default.png";
        
        if(strcmp($user,"Doctor")==0)
        {
            $typeofdoctor=$_POST['typeofdoctor'];
            $degree=$_POST['degree'];
            $initialpath="doctor";
        }
        if (!empty($_FILES["image_url"]["name"])) {
            $target_location = "../".$initialpath."/images/". basename($_FILES["image_url"]["name"]);
            $ext = pathinfo($target_location, PATHINFO_EXTENSION);
        
            if (!(move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_location))) 
            {
                echo "Error: " . $_FILES["image_url"]["error"] . "<br>";
            }
            else{
                $imageurl = "../".$initialpath."/images/".$email . ".JPG";
                rename($target_location, $imageurl);
            }
        }
        
        $handler = (new DBFactory())->DBHandler;
        if(strcmp($user,"Doctor")==0)
        {
            $insertQuery = $handler->prepare("insert into Doctor(name,gender,degree,typeofdoctor,hospitaladdress"
                                        . ",phoneno,birthdate,imageurl, d_email, password)"
                                        ." values(?,?,?,?,?,?,?,?,?,?)");
            $insertQuery->execute(array($name,$gender,$degree,$typeofdoctor,$address,$phoneno,$birthdate,$imageurl, $email,$password));
        }
        else
        {
            $insertQuery = $handler->prepare("insert into Patient(name,gender,address"
                                        . ",phoneno,birthdate,imageurl, p_email, password)"
                                        ." values(?,?,?,?,?,?,?,?)");
            $insertQuery->execute(array($name,$gender,$address,$phoneno,$birthdate,$imageurl, $email,$password));
        }
    }
    header("Location: ../view_login.php");
    exit();
?>