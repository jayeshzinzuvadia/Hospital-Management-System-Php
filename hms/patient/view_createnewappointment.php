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
        <script>
            function setAppointment(count){
                var chief_complaint = document.getElementById("chief_complaint"+count);
                var setbutton = document.getElementById("setbutton"+count);
                var description = document.getElementById("description"+count);
                var submitbutton = document.getElementById("submitbutton"+count);
                
                var check=chief_complaint.style.display;
                var value="none";
                setbutton.innerHTML="Set Appointment";
                setbutton.className="btn btn-lg btn-success";
                if(check.includes("none",0))
                {    
                    value="";
                    setbutton.innerHTML="Cancel";
                    setbutton.className="btn btn-lg btn-danger align-content-md-end";
                }
                chief_complaint.style.display=value;
                description.style.display=value;
                submitbutton.style.display=value;                
            }
        </script>
    </head>
    <body>
        <?php 
            include '_header.php';
        ?>
        <h2 class="mb-4" style="color: #ff0cd0">Select Doctor to Create New Appointment</h2>
<!---------------------------------------------------------------------------------------->
        <?php 
            $list=PatientJob::getInstance()->getDoctorList();
            if(isset($_POST['submit']))
            {
                PatientJob::getInstance()->createAppointment($p_email,$_POST['d_email'],$_POST['chief_complaint'],$_POST['description']);
            }
            $count=0;
            foreach($list as $r){
                $count+=1;
        ?>
        <form action="#" method="POST">
                <div class="row" style="padding: 4px">
                    <div class="col-sm-8">
                        <div class="card" style="max-width:800px">
                            <div class="card-header" style="padding:6px 16px 6px 20px">
                                <h4>Set Appointment With <b><?php echo "Dr. ".$r->getName() ;?></b></h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Type of Doctor</strong> : <?php echo $r->getType(); ?>
                                        </div>
                                        <div class="col">
                                            <strong>Degree</strong> : <?php echo $r->getDegree(); ?>
                                        </div>
                                    </div>
                                </li>    
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Phone Number</strong> : <?php echo $r->getPhno(); ?>
                                        </div>
                                        <div class="col">
                                            <strong>Gender</strong> : <?php echo $r->getGender(); ?>
                                        </div>
                                    </div>
                                </li>    
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Hospital Address</strong> : <?php echo $r->getAddress(); ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul id="chief_complaint<?php echo $count; ?>" class="list-group" style="display: none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Chief Complaint</strong> :
                                            <input type="text" class="form-control" required="" name="chief_complaint">
                                        </div>
                                    </div>    
                                </li>
                            </ul>
                            <ul id="description<?php echo $count; ?>" class="list-group" style="display: none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Description</strong> :
                                            <input type="text" class="form-control"  required=""  name="description">
                                        </div>
                                    </div>    
                                </li>
                            </ul> 
                            <input type="hidden" name="d_email" value="<?php echo $r->getEmail();?>">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div id="submitbutton<?php echo $count; ?>" class="col" style="display: none">
                                            <button type="submit" class="btn btn-lg btn-success" name="submit">Submit</button>
                                        </div>
                                        <div class="col">
                                            <button id="setbutton<?php echo $count; ?>" onclick="setAppointment(<?php echo $count;?>)" type="button" class="btn btn-lg btn-success" name="setbutton">Set Appointment</button>
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