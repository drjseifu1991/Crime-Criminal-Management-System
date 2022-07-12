<?php
session_start();
$_SESSION['uname'] = "";
include 'Connection.php';
$uname = $uname_err = $password = $password_err = "";
if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $password = md5($password);

    //form validation
    if (empty ($_POST["uname"])) {  
    $uname_err = "You didn't enter the username.";    
    } 
    if (empty ($_POST["password"])) {  
    $password_err = "You didn't enter the password.";    
    } 
    else {  
    $password_err = "Incorrect password!";
    }
    
    $query = "SELECT * FROM users where uname='$uname' AND password='$password' LIMIT 0,1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) == 1){
        //user logged successfully
        $id= $user['id'];

        // check if role is 1
        $query = "SELECT user_id FROM auth_role where user_id='$id' AND role_id=1";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['role_id'] = 1;
            $_SESSION['user_id'] = $id;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: DP_index.php");
        }
        
        // check if role is 2
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=2";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['role_id'] = 2;
            $_SESSION['user_id'] = $id;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: TPO_index.php");
        }
        // check if role is 3
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=3";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['role_id'] = 3;
            $_SESSION['user_id'] = $id;
            $_SESSION['message'] = "LOGIN SUCCESSFUL!";
            header("location: CPP_index.php");
        }

        // check if role is 4
        $query = "SELECT * FROM auth_role where user_id='$id' AND role_id=4";
        $result = mysqli_query($db, $query);
        #if($user['role']==5){
        if(mysqli_num_rows($result) > 0){
            $_SESSION['uname'] = $uname;
            $_SESSION['role_id'] = 4;
            $_SESSION['user_id'] = $id;
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
<title>Bahirdar police staton</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<style type="text/css">
    .error{
      color: #ff0000;
    }
</style>
</head>
<body>

<!--main-container-part-->
  
<div id="content">
  <div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>

        <h5>
          <?php 
                                       
            if(isset($_SESSION['message'])){
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            }else{
              ?>
              Login
              <?php  } ?>
          </h5>
        </div>

        <div class="widget-content nopadding">
          <form action="login.php" method="POST" class="form-horizontal">
            <div class="control-group">
            <div class="control-group <?php echo (!empty($uname_err)) ? 'has-error' : ''; ?>">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" name="uname" placeholder="Username"  value="<?php echo $uname; ?>" />
                <br>
                <span class="error"><?php echo $uname_err; ?></span>
              </div>
            </div>

            <div class="control-group  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password" class="span11" name="password" placeholder="Password"  value="<?php echo $password; ?>" />
                <br>
                <span class="error"><?php echo $password_err; ?></span>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" name="login" id="login" class="btn btn-success">LOGIN</button>
            </div>
            <div class="login">
              <p align="center">Not registerd? <a href="register.php" style="color: blue;">Create an account!</a> </p>
            </div>
          </form>
        </div>
      </div>
    </div>
<!--End-breadcrumbs-->

</div>
</div>
</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<!--end-Footer-part-->

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 
</body>
</html>
