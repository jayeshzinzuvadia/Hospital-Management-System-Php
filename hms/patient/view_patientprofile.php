<?php
include '../_LoginVerify.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Patient Profile Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="js/style.css">
        <script>
            function myFunction() {

                var file = document.getElementById('img').files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.img-responsive').attr('src', e.target.result);
                    var image = document.createElement("img");
                    image.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        </script>
    </head>
    <body>
<?php
include "_header.php";
$r = PatientJob::getPatient($p_email);
?>
<?php
$p_email = $_SESSION['email'];
$patient = PatientJob::getInstance()->getPatient($p_email);

if (isset($_POST['save'])) {
    $imageurl = $patient->getImgurl();
    $address = $_POST['address'];
    $phoneno = $_POST['phoneno'];
    if (!empty($_FILES["img"]["name"])) {
        $imageurl = "images/" . $p_email . ".JPG";
    }
    PatientJob::getInstance()->updatePatient($p_email,$address,$phoneno,'img');
}
?>
<!------------------------------------------------------------------------------------------->
        <form class="form" action="#" method="post" id="registrationForm" enctype="multipart/form-data" >
            <div class="row"><!--div4-->
                <div class="col-sm-3"><!--left col-->
                    <img src="<?php echo $r->getImgurl(); ?>" class="img-responsive img-thumbnail" > 
                    <div class="ml-2 col-sm-6">
                        <input type="file" name="img" class="file" id="img" accept="image/*" onchange="myFunction()" title="To Update Profile Picture">
                    </div>
                </div>
                <div class="col-sm-9">  
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">                  
                            <div class="row">
                                <div class="col-8" style="padding:0">
                                    <label for="name" style="margin:4px 0px 0px 0px"><strong>Name</strong></label>
                                    <input type="text" class="form-control" name="name" id="name" readonly=""
                                           value="<?php echo $r->getName(); ?>" title="Enter your first name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8" style="padding:0">
                                    <label for="gender" style="margin:4px 0px 0px 0px"><strong>Gender</strong></label>
                                    <input type="text" class="form-control" name="gender" readonly=""
                                           value="<?php echo $r->getGender(); ?>" id="gender">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8" style="padding:0">
                                    <label for="birthdate" style="margin:4px 0px 0px 0px"><strong>Birthdate</strong></label>
                                    <input type="text" class="form-control" name="birthdate" readonly=""
                                           value="<?php echo date_format(date_create($r->getBirthdate()), "d/m/Y"); ?>" id="birthdate" title="enter your birthdate">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8" style="padding:0">
                                    <label for="email"style="margin:4px 0px 0px 0px"><strong>Email</strong></label>
                                    <input type="email" class="form-control" name="email" id="email" readonly value="<?php echo $r->getEmail(); ?>" title="enter your email.">
                                </div>
                            </div>

                            <div class="row">  
                                <div class="col-8" style="padding:0">
                                    <label for="phoneno"style="margin:4px 0px 0px 0px"><strong>Phone Number</strong></label>
                                    <input type="number" class="form-control" name="phoneno" id="phoneno" value="<?php echo $r->getPhno(); ?>" title="enter your mobile number if any.">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8"style="padding:0">
                                    <label for="text" style="margin:4px 0px 0px 0px"><strong>Address</strong></label>
                                    <input type="text" class="form-control" name="address"  id="address" value="<?php echo $r->getAddress(); ?>" title="enter address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit" name="save">Save</button>
                                    <button class="btn btn-lg btn-warning" type="reset">Reset</button>
                                </div>
                            </div>

                        </div><!--/tab-pane-->                          
                    </div><!--/tab-pane-->
                </div><!--/tab-content-->
            </div><!--div4-->
        </form>
        <!------------------------------------------------------------------------------------------->
<?php include"_footer.php"; ?> 
    </body>
</html>