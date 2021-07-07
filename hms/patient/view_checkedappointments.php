<?php
    include '../_LoginVerify.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Patient Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="js/style.css">
    </head>
    <body>
        <?php 
            include '_header.php';
        ?>
       <h2 class="mb-4" style="color: #0fbc31">Checked Appointments</h2>
<!---------------------------------------------------------------------------------------->
        <?php 
            $p_email=$_SESSION['email'];
            $list= PatientJob::getInstance()->getAppointment($p_email,'checked');
            foreach($list as $r)
                {
        ?>
                <div class="row" style="padding: 4px">
                    <div class="col-sm-8">
                        <div class="card" style="max-width:800px">
                            <div class="card-header" style="padding:6px 16px 6px 20px">
                                <h4>Appointment With 
                                    <b><?php echo "Dr. ".$r->getDoctor()->getName() ;?></b>
                                </h4>
                                <small style="font-size: larger;">
                                    <?php
                                        if($r->getTime()!=null)
                                        {    
                                            $appointmentdate=date_create($r->getTime());
                                            echo "on ".date_format($appointmentdate,"d/m/Y l")." at ".date_format($appointmentdate,"H:i A");
                                            //echo $r['appointmenttime']; 
                           
                                            }
                                    ?>
                                </small>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item" style="padding:6px 16px 6px 20px">
                                    <strong>Chief Complaint</strong> : <?php echo $r->getChiefcomplaint(); ?></li>
                                <li class="list-group-item" style="padding:6px 16px 6px 20px">
                                    <strong>Prescription</strong> : <?php echo $r->getPrescription(); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
<!---------------------------------------------------------------------------------------->
        <?php include '_footer.php'; ?>
    </body>
</html>