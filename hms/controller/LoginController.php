<?php
session_start();
require("../database/_connection.php");

class LoginController {
    function __construct() {}
    public function verify($email, $passwd) {

        $handler = (new DBFactory())->DBHandler;
        $pquery = $handler->prepare("select p_email from patient where p_email=? and password=? ");
        $pquery->execute(array($email, $passwd));
        $pcount = $pquery->rowcount();
        $dquery = $handler->prepare("select d_email from doctor where d_email= ? and password= ? ");
        $dquery->execute(array($email, $passwd));
        $dcount = $dquery->rowcount();

        $link = "Location : ../view_login.php";
        if ($pcount > 0 or $dcount > 0) {

            $_SESSION['email'] = $email;
            $link = "Location: ../doctor/view_doctorhome.php?email=" . $email;
            if ($pcount > 0) {
                $link = 'Location: ../patient/view_patienthome.php?email=' . $email;
            }
        }
        else
        {
            $link = 'Location: ../view_login.php?invalidUser=true';
        }
        return $link;
    }

}

$link = "Location : ../view_login.php";

$email = $_POST['email'];
$passwd = $_POST['passwd'];

$instance = new LoginController();
if (!empty($email) and !empty($passwd)) {
    $link = $instance->verify($email, $passwd);
}

header($link);
exit();

?>