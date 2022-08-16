<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ;
  $e_id = $_SESSION['eid']; 
  
      //variable for error
    if($_SESSION['role_id']!=8){
      unset($_SESSION['role_id']);
      header("location: login.php");  

    }
  }
  else{  
   header("location: login.php");  
  }

include 'Connection.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Bahirdar police staton</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- <link rel="stylesheet" href="css/4/bootstrap.min.css" /> -->
<link rel="stylesheet" href="css/bootstrap.min.css" />

<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link rel="stylesheet" href="css/select2.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <img src="img/logo.JPG">
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="" ><a title="" href="C_profile.php"><span class="profile"><?php  echo $_SESSION['uname']; ?></span></a>
    </li>
    <li><a href="C_notification.php"><i class="icon icon-bell"></i> <span class="text">Notification</span></a>
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="Admin.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
  <li><a href="HR_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Employee<b class="caret"></b></span></a> 
      <ul>
        <li class="active"><a href="HR_r_employee.php"><i class="icon-plus"></i>Register Employee</a></li>
        <li><a href="HR_v_employee.php"><i class="icon-eye-open"></i>View Employee</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="DP_index.php" class="current"><i class="icon-home"></i> Home</a></div>
  </div>
  <!--End-breadcrumbs-->
 
  <div class="container-fluid">
  <?php 
  $fname_err = $mname_err = $lname_err = $gender_err = $age_err = "";
  $mobile_err = $email_err = $uname_err =" ";
  $fname = $mname = $lname = $gender = $age = "";
  $mobile = $email = $uname = $id =" ";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
    $n = mysqli_fetch_array($record);
    $fname = $n['fname'];
    $mname = $n['mname'];
    $lname = $n['lname'];
    $gender = $n['gender'];
    $age = $n['age'];
    $mobile = $n['mobile']; 
    $email = $n['email'];
    $uname = $n['uname'];
    echo $id;
  }
      if (isset($_POST['updatee'])){
        

        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $mname = mysqli_real_escape_string($db, $_POST['mname']);
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $age = mysqli_real_escape_string($db, $_POST['age']);
        $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $uname = mysqli_real_escape_string($db, $_POST['uname']);
        if (empty ($_POST["fname"])) {  
          $fname_err = "You didn't enter the first name.";   
       } 
    
        else if (empty ($_POST["mname"])) {  
        $mname_err = "You didn't enter the middle name.";   
        } 
    
     
      
        else if (empty ($_POST["lname"])) {  
        $lname_err = "You didn't enter the last name.";    
        }    
      
      
      
        else if (empty ($_POST["gender"])) {  
        $gender_err = "You didn't select the gender.";    
        }
      
        else if (empty ($_POST["age"])) {  
        $age_err = "You didn't enter the age.";    
        }
      
        
      
      
        else if (empty ($_POST["mobile"])) {  
        $mobile_err = "You didn't enter the mobile number.";   
        } 
      
      
        else if (strlen ($mobile) != 10) {  
          $mobile_err = "Mobile number must contain 10 digits.";  
        }
        
        else if (empty ($_POST["email"])) {  
        $email_err = "You didn't enter the email.";    
        }
      
          // check that the e-mail address is well-formed 
        else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)){
          $email_err = "Invalid email!";
        } 
        
        else if (empty ($_POST["uname"])) {  
        $uname_err = "You didn't enter the username.";    
        }  
        else {
            // $query = "UPDATE users SET mname = 'nan sam' WHERE id = $e_id";
            $query = "UPDATE users SET fname= '$fname', mname = '$mname', lname = '$lname', gender = '$gender', age = '$age', mobile = '$mobile', email = '$email', uname = '$uname' WHERE id = '$id' ";
            // $query = "UPDATE auth_role SET role_id = $role_id WHERE user_id = $user_id";
            // $query = "UPDATE users SET fname = $fname, mname = $mname, lname = $lname, gender = $gender, age = $age, mobile = $mobile, email = $email, uname = $uname WHERE id = $e_id";
      
            // echo "Employee updated Successfully.";
            if(mysqli_query($db, $query)) {
                echo "<h1>Employee updated Successfully</h1>";
              }
              else {
                echo "<h1>Employee not updated Successfully</h1>";
              }
        }   
      }  
?>
        

    


    <div class="container-fluid">
    <div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
            <h5>Update</h5>
            </div>

            <div class="widget-content nopadding">
            <form action="HR_u_employee.php" method="POST" class="form-horizontal">
                <div class="control-group">
                <div class="control-group ">
                <label class="control-label">First Name :</label>
                <div class="controls">
                    <input type="text" class="span11" name="fname" value="<?php echo $fname; ?>"/>
                    <input type="text" class="hide" name="id" value="<?php echo $id; ?>"/>
                    <br>
                    <span class="error"><?php echo $fname_err; ?></span>
                </div>
                </div>

                <div class="control-group ">
                <label class="control-label">Middle Name :</label>
                <div class="controls">
                    <input type="text" class="span11" name="mname" value="<?php echo $mname; ?>"  />
                    <br>
                    <span class="error"><?php echo $mname_err; ?></span>
                </div>
                </div>

                <div class="control-group ">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                    <input type="text" class="span11" name="lname" value="<?php echo $lname; ?>" />
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
                    <input type="text" class="span11" name="age" value="<?php echo $age; ?>"  />
                    <br>
                    <span class="error"><?php echo $age_err; ?></span>
                </div>
                </div>

                <div class="control-group ">
                <label class="control-label">Mobile :</label>
                <div class="controls">
                    <input type="text" class="span11" name="mobile" value="<?php echo $mobile; ?>"  />
                    <br>
                    <span class="error"><?php echo $mobile_err; ?></span>
                </div>
                </div>

                <div class="control-group">
                <label class="control-label">Email :</label>
                <div class="controls">
                    <input type="text" class="span11" name="email" value="<?php echo $email; ?>" />
                    <br>
                    <span class="error"><?php echo $email_err; ?></span>
                </div>
                </div>

                <div class="control-group">
                <label class="control-label">Username :</label>
                <div class="controls">
                    <input type="text" class="span11" name="uname" value="<?php echo $uname; ?>"/>
                    <br>
                    <span class="error"><?php echo $uname_err; ?></span>
                </div>
                </div>
                
                
                <div class="form-actions">
                <button type="submit" name="updatee" id="register" class="btn btn-success">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>

</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2021 &copy; Bahirdar University(BiT) Computer Engineering <a href="http://www.bdu.edu.et">www.bdu.edu.et</a> </div>
</div>

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

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
