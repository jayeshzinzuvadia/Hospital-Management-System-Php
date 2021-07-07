<!DOCTYPE html>
<html>
    <style>
    body {
        background-image: url('background/h.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: lightblue;
        background-size: cover;
    }
    </style>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/signin.css">
    </head>
    <body>
        <form class="form-signin" method="post" action="controller/LoginController.php">
            <h1 class="h3 mb-3 text-center">Sign In</h1>
            <?php if(isset($_GET['invalidUser'])) { ?>
                <h5 style="color: #fa0b04">* Invalid Username or Password</h5>
            <?php } ?>
            <div class="form-group">
                <label>Email : </label>
                <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            </div>
            <div class="form-group">
                <label>Password : </label>
                <input type="password" name="passwd" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-lg btn-primary btn-block" name="Submit">
            </div>
            <p class="mt-5 mb-3 text-center">If you are a new user then</p>
            <div class="text-center">    
                <a href="view_registration.php" role="button" class="btn btn-success">Create an account </a>
            </div>
        </form>
    </body>
</html>
