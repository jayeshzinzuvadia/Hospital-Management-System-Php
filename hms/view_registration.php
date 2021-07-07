<!doctype html>
<html lang="en">
    <head>
        <title>Create New Account</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="js/style.css">
        <script>
            function myFunction() {
                var file = document.getElementById('image').files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.img-responsive').attr('src', e.target.result);
                    var image = document.createElement("img");
                    image.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
            function addFields() {
                var drfields = document.getElementById('drfields');
                var check = drfields.style.display;
                var value = 'none';
                if (check.includes("none", 0))
                {
                    value = "";
                }
                drfields.style.display = value;
            }
            function validateInputs() {

                var passwd = document.getElementById('passwd').value;
                var repasswd = document.getElementById('repasswd').value;
                if (repasswd.localeCompare(passwd) != 0)
                {
                    document.getElementById('pass').style.color = 'red';
                    document.getElementById('pass').innerHTML = "*Not Matching Password and Reenter Password";
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body> 
        <div class="container">
            <h2 class="mb-4 text-center" style="float: center;color: #f71564">Registration Form</h2>
            <a href="view_login.php" class="btn btn-primary" style="float:right;" role="button">Go Back To Login</a>        
        </div>
        <form class="form" action="controller/RegistrationController.php" onsubmit="return validateInputs()" method="post" id="registrationForm"
              enctype="multipart/form-data">
            
        <fieldset class="col-md-10">
            
            <div class="row"><!--div4-->

                <div class="col-sm-3"><!--left col-->
                    <img src="patient/images/default.png" class="img-responsive img-thumbnail"> 
                    <div class="ml-2 col-sm-6">
                        <input type="file" name="image_url" id="image" class="file" accept="image/*" onchange="myFunction()"title="To Update Profile Picture">
                    </div>            
                </div> 
                <div class="col-sm-9">  
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            
                            <div class="row" style="padding:4px 0px 4px 0px">
                                <div class="col-5">
                                    <label for="user"><strong>Register As</strong></label>
                                    <select name="user" id="user" required="" class="form-control" onchange="addFields()">
                                        <option value="Patient">Patient</option>
                                        <option value="Doctor">Doctor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding:4px 0px 4px 0px">
                                <div class="col-4">
                                    <label for="name"><strong>Full Name</strong></label>
                                    <input type="text" class="form-control" name="name" id="name" 
                                           value="" title="Enter your first name" required="">
                                </div>
                            </div>
                            <div class="row" style="padding:4px 0px 4px 0px">  
                                <div class="col-5">
                                    <label for="gender"><strong>Gender</strong></label>
                                    <input type="radio" class="form-check-inline" name="gender" required="" value="male">Male &nbsp;
                                    <input type="radio" class="form-check-inline" name="gender" required="" value="female"> Female
                                </div>
                            </div>
                            <div class="row" style="padding:4px 0px 4px 0px">
                                <div class="col-4">
                                    <label for="birthdate"><strong>Birthdate</strong></label>
                                    <input type="date" class="form-control" name="birthdate"
                                           id="birthdate" title="enter your birthdate" required="">
                                </div>
                                <div class="col-4">
                                    <label for="phoneno"><strong>Phone Number</strong></label>
                                    <input type="number" class="form-control" name="phoneno" required="" id="phoneno" title="enter your mobile number">
                                </div>
                            </div>

                            <div id="drfields" class="row" style="display: none;padding:4px 0px 4px 0px">  
                                <div class="col-4">
                                    <label for="type"><strong>Type of Doctor</strong></label>
                                    <select name="typeofdoctor" class="form-control" required="">
                                        <option value="cardiologist">Cardiologist</option>
                                        <option value="orthopedic">Orthopedic</option>
                                        <option value="dentist">Dentist</option>
                                        <option value="neurologist">Neurologist</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="degree"><strong>Degree</strong></label>
                                    <select name="degree" class="form-control" required="">
                                        <option value="MBBS">MBBS</option>
                                        <option value="MD">MD</option>
                                        <option value="MS">MS</option>
                                        <option value="MDS">MDS</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row" style="padding:4px 0px 4px 0px">
                                <div class="col-8">
                                    <label for="text"><strong>Address</strong></label>
                                    <input type="text" class="form-control" name='address' required="" id="address" title="enter address">
                                </div>
                            </div>

                            <div class="row" style="padding:4px 0px 4px 0px">
                                <div class="col-4">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" class="form-control" name="email" id="email" required="" title="enter your email">
                                </div>
                            </div>

                            <div class="row" style="padding:4px 0px 4px 0px">  
                                <div class="col-4">
                                    <label for="password"><strong>Password</strong></label>
                                    <input type="password" class="form-control" name="password" id="passwd" required="" placeholder="Password" title="enter your password.">
                                </div>
                                <div class="col-4">
                                    <label for="password2"><strong>Reenter Password</strong></label>
                                    <input type="password" class="form-control" name="repassword" required="" id="repasswd" placeholder="Reenter Password" title="confirm your password.">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10">
                                    <p id='pass'></p>
                                </div>
                            </div>

                            <div class="row" style="padding:4px 0px 4px 0px">
                                <div class="col-4">
                                    <br>
                                    <button class="btn btn-lg btn-success" onclick="validateInputs()" type="submit" name="save">Save</button>
                                    <button class="btn btn-lg btn-warning" type="reset">Reset</button>
                                </div>
                            </div>
                        </div><!--/tab-pane-->                          
                    </div><!--/tab-pane-->
                </div><!--/tab-content-->
            </div><!--div4-->
            </fieldset>
        </form> 
        <script src="js/bootstrap.min.js"></script>
        <script src="doctor/js/jquery.min.js"></script>
        <script src="doctor/js/main.js"></script>
    </body>
</html>