<?php
include 'Connection.php';
session_start();
if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $password = md5($password);
    
    $query = "SELECT * FROM users where uname='$uname' AND password='$password' LIMIT 0,1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) == 1){
        //user logged successfully
        $id= $user['id'];

        // check if role is 1
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=1";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: DP_index.php");
        }
        
        // check if role is 2
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=2";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: TPO_index.php");
        }
        // check if role is 3
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=3";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: CPP_index.php");
        }

        // check if role is 4
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=4";
        $result = mysqli_query($db, $query);
        #if($user['role']==5){
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: TP_index.php");
        }
        // check if role is 5
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=5";
        $result = mysqli_query($db, $query);
        #if($user['role']==5){
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: C_index.php");
        }
        
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bahirdar police staton</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>

                                        <?php 
                                       
                                if(isset($_SESSION['message'])){
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }else{
                               ?>
                                    Login
                                <?php  } ?>
                                </h3>
                                </div>
                            </div>
                            <div class="form-account">
                                <form action="login.php" method="post" role="form" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="uname" placeholder="Username..." class="form-username form-control" id="form-username">
                                    </div>

                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>

                                    <button type="submit" name="login" class="btn">Login</button>
                                    <div class="login">
                                        <p>Not registerd? <a href="register.php">Create an account!</a> </p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>