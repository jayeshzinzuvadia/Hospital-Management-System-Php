<?php
    include '../_LoginVerify.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Doctor Home Page</title>
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
        <h2 class="mb-4">My Appointments</h2>
        
<!---------------------------------------------------------------------------------------->
        <?php 
            $d_email=$_SESSION['email'];
            if(isset($_POST['cancel']))
            {
                $case_id=(int)$_POST['cancel'];
                DoctorJob::getInstance()->cancelAppointment($case_id);
            }
            if(isset($_POST['submit']))
            {
                DoctorJob::getInstance()->setPrescription($_POST['prescription'],$_POST['p_email'],$d_email,$_POST['appointmenttime']);
            }
            $list=DoctorJob::getInstance()->getAppointment($d_email,'confirmed');
            foreach($list as $r)
            {
        ?>
            <form method="POST">
                <input type="hidden" name="appointmenttime" value="<?php echo $r->getTime(); ?>">
                <input type="hidden" name="p_email" value="<?php echo $r->getPatient()->getEmail(); ?>">
                <div class="row" style="padding: 4px">
                    <div class="col-sm-8">
                        <div class="card" style="max-width:800px">
                            <div class="card-header" style="padding:6px 16px 6px 20px">
                                <h4>Appointment with
                                    <b><?php 
                                        if(strcmp($r->getPatient()->getGender(),"male")==0)
                                        {   echo "Mr. ".$r->getPatient()->getName();    }
                                        else
                                        {   echo "Miss ".$r->getPatient()->getName();    }
                                    ?></b>
                                </h4>
                                <small style="font-size: larger;">
                                    <?php
                                        if($r->getTime()!=null)
                                        {    
                                            $appointmentdate=date_create($r->getTime());
                                            echo "on ".date_format($appointmentdate,"d/m/Y l")." at ".date_format($appointmentdate,"H:i A");
                                        }
                                    ?>    
                                </small>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item"  style="padding:6px 16px 6px 20px">
                                    <strong>Chief Complaint</strong> : <?php echo $r->getChiefcomplaint();?>                                          
                                </li>
                                <li class="list-group-item"  style="padding:6px 16px 6px 20px"><strong>Description</strong> : <?php echo $r->getDescription(); ?></li>
                                <li class="list-group-item"  style="padding:6px 16px 6px 20px"><strong>Prescription</strong> : 
                                    <input type="text" class="form-control" name="prescription"
                                           value="<?php echo $r->getPrescription(); ?>">
                                </li>
                                <li class="list-group-item"  style="padding:6px 16px 6px 20px">    
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="form-control btn-success" name="submit" value="Submit">
                                        </div>
                                        <div class="col">
                                            <input type="reset" class="form-control btn-warning" name="reset" value="Reset">
                                        </div>
                                        <div class="col">
                                            <button type="submit" style="float: right" class="form-control btn-danger"
                                                name="cancel" value="<?php echo $r->getCaseid(); ?>">
                                            Cancel Appointment</button>
                                        </div>
                                    </div>
                                </li>    
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
          <?php } ?>
<!---------------------------------------------------------------------------------------->
        <?php include '_footer.php'; ?>
    </body>
</html>