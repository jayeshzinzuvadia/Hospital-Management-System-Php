<?php
//    $requesturi = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//    $link=["nav-item ","nav-item ","nav-item ",
//        "nav-item ","nav-item ","nav-item "];
//    if(strpos($requesturi, "view_patienthome")!==false){$link[0].="active";}
//    if(strpos($requesturi, "view_createnewappointment")!==false){$link[1].="active";}
//    if(strpos($requesturi, "view_pendingappointments")!==false){$link[2].="active";}
//    if(strpos($requesturi, "view_checkedappointments")!==false){$link[3].="active";}
//    if(strpos($requesturi, "view_patientprofile")!==false){$link[4].="active";}
    require '../database/PatientJob.php';
    $p_email = $_SESSION['email'];
    $r= PatientJob::getInstance()->getPatient($p_email);
    $uri = $r->getImgurl();
    ?>

<!--script>
   var uri= window.location.href;  
</script-->
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="p-4 pt-5">
            <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo $uri?>);"></a>
            <ul class="list-unstyled components mb-5">
                <li class="nav-item "><a href="view_patienthome.php" class="">Home</a></li>	          
                <li class="nav-item"><a href="view_createnewappointment.php">Create New Appointments</a></li>
                <li class="nav-item"><a href="view_pendingappointments.php">Pending Appointments</a></li>                
                <li class="nav-item"><a href="view_checkedappointments.php">Checked Appointments</a></li>
                <li class="nav-item"><a href="view_patientprofile.php">View Profile</a></li>	          
                <li class="nav-item"><a href="../controller/LogOutController.php?logout=true">Log Out</a></li>
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