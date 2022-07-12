
<?php  include 'Connection.php'; ?>
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

        <?php 
            session_start();
            if (isset($_POST['register'])){


            //variable for error
            $fname = $mname = $lname = $gender = $age =$job = $mobile = $email = $uname = $password = $cpassword = "";
                //variable for error
           $fname_err = $mname_err = $lname_err = $gender_err = $age_err =$job_err = $mobile_err = $email_err = $uname_err = $password_err = $cpassword_err = "";


                $fname = mysqli_real_escape_string($db, $_POST['fname']);
                $mname = mysqli_real_escape_string($db, $_POST['mname']);
                $lname = mysqli_real_escape_string($db, $_POST['lname']);
                $gender = mysqli_real_escape_string($db, $_POST['gender']);
                $age = mysqli_real_escape_string($db, $_POST['age']);
                $job = mysqli_real_escape_string($db, $_POST['job']);
                $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
                $email = mysqli_real_escape_string($db, $_POST['email']);
                $uname = mysqli_real_escape_string($db, $_POST['uname']);
                $password = mysqli_real_escape_string($db, $_POST['password']);
                $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

                if($password == $cpassword){
                    $user_query = "SELECT * FROM users WHERE uname='$uname'";
                    $result = mysqli_query($db, $user_query);
                    $user = mysqli_fetch_assoc($result);

                    if($user){
                        // check unique
                    }
                    else{
                        $password = md5($password);
                        $query = "INSERT INTO users (fname, mname, lname, gender, age, job, mobile, email, uname, password) VALUES ('$fname', '$mname', '$lname', '$gender', '$age', '$job', '$mobile', '$email', '$uname', '$password' )";
                        mysqli_query($db, $query);

                        $query = "SELECT * FROM users where uname='$uname' ";
                        $result = mysqli_query($db, $query);
                        $user = mysqli_fetch_array($result);
                        $id= $user['id'];

                        $query = "INSERT INTO auth_role (user_id, role_id) VALUES ('$id', 5)";
                        mysqli_query($db, $query);

                        $_SESSION['message'] = "You are registered successfully. Now you can login to the system.";
                        header('location: login.php');
                    }
                }
            }
                
                
        ?>
        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3 class="login">Register</h3>
                                    
                                </div>
                            </div>
                            <div class="form-account">
                                <form role="form" action="register.php" method="POST" class="login-form">
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">First Name</label>
                                        <input type="text" name="fname" placeholder="First Name" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">Middle Name</label>
                                        <input type="text" name="mname" placeholder="Middle Name" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">Last Name</label>
                                        <input type="text" name="lname" placeholder="Last Name" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <div class="control">
                                             <input type="radio" name="gender" value="male"> Male<br>
                                             <input type="radio" name="gender" value="female"> Female<br>
                                             <input type="radio" name="gender" value="other"> Other
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">Age</label>
                                        <input type="text" name="age" placeholder="Age" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">Job</label>
                                        <input type="text" name="job" placeholder="Job" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">Mobile</label>
                                        <input type="text" name="mobile" placeholder="Mobile" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">Email</label>
                                        <input type="text" name="email" placeholder="Email" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-username">Username</label>
                                        <input type="text" name="uname" placeholder="Username" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="controle-lebel" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password">
                                    </div>
                                    <div class="form-group">
                                        <label  class="controle-lebel" for="form-password">Confirm Password</label>
                                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" name="register" id="register" class="btn btn-success">Register</button>
                                    <div class="login">
                                        <p>Aleredy have account! <a href="login.php">Login</a> </p>
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