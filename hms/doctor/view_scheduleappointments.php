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
            function setAppointment(count) {
                var chief_complaint = document.getElementById("chief_complaint" + count);
                var setbutton = document.getElementById("setbutton" + count);
                var submitbutton = document.getElementById("submitbutton" + count);

                var check = chief_complaint.style.display;
                var value = "none";
                setbutton.innerHTML = "Set Time";
                if (check.includes("none", 0))
                {
                    value = "";
                    setbutton.innerHTML = "Cancel";
                }
                chief_complaint.style.display = value;
                submitbutton.style.display = value;
            }
        </script>
    </head>
    <body>
        <?php
        include '_header.php';
        ?>
        <h2 class="mb-4" style="color: #ff0cd0">Schedule Arrival Appointments</h2>
        <!---------------------------------------------------------------------------------------->
        <?php
        if (isset($_POST['reject'])){
            DoctorJob::getInstance()->cancelAppointment($_POST['case_id']);
        }
        if (isset($_POST['submit'])) {
            DoctorJob::getInstance()->setDateTime($_POST['case_id'], $_POST['date'], $_POST['time']);
        }
        $list = DoctorJob::getInstance()->getAppointment($d_email, 'pending');
        
        $count = 0;
        foreach ($list as $r) {
            $count += 1;
        ?>
            <form action="#" method="POST">
                <div class="row" style="padding: 4px">
                    <div class="col-sm-8">
                        <div class="card" style="max-width:800px">
                            <div class="card-header" style="padding:6px 16px 6px 20px">
                                <h4>Set Appointment With 
                                    <b><?php
                                        if (strcmp($r->getPatient()->getGender(), "male") == 0) {
                                            echo "Mr. " . $r->getPatient()->getName();
                                        } else {
                                            echo "Miss " . $r->getPatient()->getName();
                                        }
                                        ?>
                                        <button type="submit" style="float: right" class="btn btn-lg btn-danger align-content-md-end" name="reject">Reject</button>
                                    </b>
                                </h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Chief Complaint : </strong> <?php echo $r->getChiefcomplaint(); ?>                                
                                </li>    
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Description : </strong> <?php echo $r->getDescription(); ?>                                
                                </li>   
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Phone no : </strong> <?php echo $r->getPatient()->getPhno(); ?>                                
                                </li> 
                            </ul>
                            <ul id="chief_complaint<?php echo $count; ?>" class="list-group" style="display: none">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <strong>Date</strong> :
                                            <input type="date" class="form-control" name="date">
                                        </div>
                                        <div class="col">
                                            <strong>Time</strong> :
                                            <input type="time" class="form-control" name="time">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <input type="hidden" name="case_id" value="<?php echo $r->getCaseid(); ?>">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div id="submitbutton<?php echo $count; ?>" class="col" style="display: none">
                                            <button type="submit" class="btn btn-lg btn-success" name="submit">Submit</button>
                                        </div>
                                        <div class="col">
                                            <button id="setbutton<?php echo $count; ?>" onclick="setAppointment(<?php echo $count; ?>)" type="button" class="btn btn-lg btn-success" name="setbutton">Set Time</button>
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