<?php
require '../database/DoctorJob.php';
$d_email = $_SESSION['email'];
$r = DoctorJob::getInstance()->getDoctor($d_email);
$uri = $r->getImgurl();
?>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5" style="position: fixed;">
            <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo $uri ?>);"></a>
            <h3 style="color: #f0ca21">Welcome <?php echo strtok($r->getName(), ' ');?></h3>
            <ul class="list-unstyled components mb-5">
                <li><a href="view_doctorhome.php">Home</a></li>	          
                <li><a href="view_scheduleappointments.php">Schedule Appointments</a></li>                
                <li><a href="view_checkedappointments.php">Checked Appointments</a></li>
                <li><a href="view_doctorprofile.php">View Profile</a></li>	          
                <li><a href="../controller/LogOutController.php?logout=true">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-dark">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
        </nav>