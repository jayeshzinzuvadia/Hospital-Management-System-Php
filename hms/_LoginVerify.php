<?php
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("Location: view_login.php");
        exit();
    }
?>