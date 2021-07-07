<?php
if(isset($_GET['logout']))
{
    $logout=$_GET['logout'];
    if(strcmp($logout, 'true')==0)
    {
        unset($_SESSION['email']);
        unset($_SESSION['PatientJob']);
        unset($_SESSION['DoctorJob']);
        unset($_SESSION['DBFactory']);
        header("Location: ../view_login.php");
        exit();
    }
}

