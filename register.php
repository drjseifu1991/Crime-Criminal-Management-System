<?php 
      
      session_start();
      include 'Connection.php';
      
       //variable for error
      $fname = $mname = $lname = $gender = $age ="";
      $job = $mobile = $email = $uname = $password = $cpassword = "";
      //variable for error
      $fname_err = $mname_err = $lname_err = $gender_err = $age_err ="";
      $job_err = $mobile_err = $email_err = $uname_err = $password_err = $cpassword_err = "";
       if (isset($_POST['register'])){

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

        //$fname_err = array();

        if (empty ($_POST["fname"])) {  
            //array_push($fname_err, "You didn't enter the first name.");
            $fname_err = "You didn't enter the first name.";
            //return;    
         } 

        else if (!ctype_alpha(str_replace(' ', '', $fname))) {
          $fname_err = "First name must contain letters and spaces only";
          //return;
        }

              // check if name only contains letters and whitespace  
        
        else if (empty ($_POST["mname"])) {  
        $mname_err = "You didn't enter the middle name.";
        //return;    
         } 

        else if (!ctype_alpha(str_replace(' ', '', $mname))) {
          $mname_err = "Middle name must contain letters and spaces only";
          //return;
        }
   
        else if (empty ($_POST["lname"])) {  
        $lname_err = "You didn't enter the last name.";    
        //return;
         }    
       
       else if (!ctype_alpha(str_replace(' ', '', $lname))) {
          $lname_err = "Last name must contain letters and spaces only";
          //return;
        }

        else if (empty ($_POST["gender"])) {  
        $gender_err = "You didn't select the gender.";    
        //return;
         }

         else if (empty ($_POST["age"])) {  
        $age_err = "You didn't enter the age.";    
        //return;
         }
 
        else if (!is_numeric($age)) {

          $age_err = "Age value only numeric!";
          //return;

        }

         else if (empty ($_POST["job"])) {  
        $job_err = "You didn't enter the job.";  
        //return;  
         }

         else if (empty ($_POST["mobile"])) {  
        $mobile_err = "You didn't enter the mobile number."; 
        //return;   
         } 

        else if (!is_numeric($mobile)) {

          $mobile_err = "Mobile number value only numeric!";
          //return;

        }
        else if (strlen ($mobile) != 10) {  
          $mobile_err = "Mobile number must contain 10 digits.";  
          //return;
        }
        
        else if (empty ($_POST["email"])) {  
        $email_err = "You didn't enter the email.";    
        //return;
         }
  
           // check that the e-mail address is well-formed 
        else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)){
          $email_err = "Invalid email!";
          //return;
        } 

         else if (empty ($_POST["uname"])) {  
        $uname_err = "You didn't enter the username.";  
        //return;  
         }  

         else if (empty ($_POST["password"])) {  
        $password_err = "You didn't enter the password."; 
        //return;   
         }	

         else if (strlen($_POST['password']) < 6)	{
        $password_err = "Password must be greater than 6 characters!";
        //return;
        }	

       else if (empty ($_POST["cpassword"])) {  
        $cpassword_err = "You didn't enter the Confirm password.";  
        //return;  
         }

        else if($_POST['password'] !== $_POST['cpassword']){
          $cpassword_err = "Password not match!";
          //return;
        }

        $user_query_1 = "SELECT * FROM users WHERE uname='$uname'";
        $result_1 = mysqli_query($db, $user_query_1);
        $user_1 = mysqli_fetch_assoc($result_1);

        $user_query_2 = "SELECT * FROM users WHERE email='$email'";
        $result_2 = mysqli_query($db, $user_query_2);
        $user_2 = mysqli_fetch_assoc($result_2);

        $user_query_3 = "SELECT * FROM users WHERE mobile='$mobile'";
        $result_3 = mysqli_query($db, $user_query_3);
        $user_3 = mysqli_fetch_assoc($result_3);

        if(mysqli_num_rows($result_1) == 1){
          $uname_err = "Username aleredy exist! please try again.";
          //return;
        }

                                 
        else if(mysqli_num_rows($result_2) == 1){
          $email_err = "Email aleredy exist! please try again.";
          //return;
        }

                  

        else if(mysqli_num_rows($result_3) == 1){
          $mobile_err = "Mobile number aleredy exist! please try again.";
          //return;
        }

        // if($valid == True){
        //   $password = md5($password);
        //   $query = "INSERT INTO users (fname, mname, lname, gender, age, job, mobile, email, uname, password) VALUES ('$fname', '$mname', '$lname', '$gender', '$age', '$job', '$mobile', '$email', '$uname', '$password' )";
        //   $query_result = mysqli_query($db, $query);
        //   if($query_result) {
        //     $_SESSION['message'] = "You are registered successfully.";
        //     header('location: A_r_assign.php');
        //   }
        // } 
        
        $password = md5($password);  
        $query = "INSERT INTO users (fname, mname, lname, gender, age, job, mobile, email, uname, password) VALUES ('$fname', '$mname', '$lname', '$gender', '$age', '$job', '$mobile', '$email', '$uname', '$password' )";

     
      
        $query1_result = mysqli_query($db, $query);
        if($query1_result) {
          $query = "SELECT * FROM users where uname='$uname' ";
          $result = mysqli_query($db, $query);
          $user = mysqli_fetch_array($result);
          $id= $user['id'];

          $query = "INSERT INTO auth_role (user_id, role_id) VALUES ('$id', 5)";
          mysqli_query($db, $query);

          $_SESSION['message'] = "You are registered successfully. Now you can login to the system.";
          header('location: login.php');
        }
        else {
          $_SESSION['message'] = "Sorrrrrrrrr. Now you can login to the system.";
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
        <div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
        <h5>Register</h5>
        </div>

        <div class="widget-content nopadding">
          <form action="register.php" method="POST" class="form-horizontal">
            <div class="control-group">
            <div class="control-group ">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="fname" placeholder="First Name"/>
                <br>
                <span class="error"><?php echo $fname_err; ?></span>
              </div>
            </div>

            <div class="control-group ">
              <label class="control-label">Middle Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="mname" placeholder="Middle Name"  />
                <br>
                <span class="error"><?php echo $mname_err; ?></span>
              </div>
            </div>

            <div class="control-group ">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="lname" placeholder="Last Name" />
                <br>
                <span class="error"><?php echo $lname_err; ?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Gender :</label>
              <div class="controls">
                <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
                <input type="radio" name="gender" value="other"> Other<br>
                <span class="error"><?php echo $gender_err; ?></span>
              </div>
            </div>

            <div class="control-group ">
              <label class="control-label">Age :</label>
              <div class="controls">
                <input type="text" class="span11" name="age" placeholder="Age"  />
                <br>
                <span class="error"><?php echo $age_err; ?></span>
              </div>
            </div>

            <div class="control-group ">
              <label class="control-label">Job :</label>
              <div class="controls">
                <input type="text" class="span11" name="job" placeholder="Job"  />
                <br>
                <span class="error"><?php echo $job_err; ?></span>
              </div>
            </div>

            <div class="control-group ">
              <label class="control-label">Mobile :</label>
              <div class="controls">
                <input type="text" class="span11" name="mobile" placeholder="Mobile"  />
                <br>
                <span class="error"><?php echo $mobile_err; ?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" name="email" placeholder="Email" />
                <br>
                <span class="error"><?php echo $email_err; ?></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" name="uname" placeholder="Username"/>
                <br>
                <span class="error"><?php echo $uname_err; ?></span>
              </div>
            </div>
            

            <div class="control-group ">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password" class="span11" name="password" placeholder="Password" />
                <br>
                <span class="error"><?php echo $password_err; ?></span>
              </div>
            </div>

            <div class="control-group ">
              <label class="control-label">Confirm Password :</label>
              <div class="controls">
                <input type="password" class="span11" name="cpassword" placeholder="Confirm Password"  />
                <br>
                <span class="error"><?php echo $cpassword_err; ?></span>
              </div>
            </div>
            
            <div class="form-actions">
              <button type="submit" name="register" id="register" class="btn btn-success">Register</button>
            </div>
            <div class="login">
              <p align="center" style="font-style: italic;">Aleredy have an account! <a href="login.php" style="color: blue ;">Login </a> </p>
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
