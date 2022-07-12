<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ; 
    if($_SESSION['role_id']!=1 && $_SESSION['role_id']!=3){
      unset($_SESSION['uname']);
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
    color: red;
  }h3{color: green;
  font-style: bold;}
</style>
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
    <li  class="" ><a title="" href="DP_profile.php"> <span class="profile"><?php  echo $_SESSION['uname']; ?></span></a>
    </li>
    <li class=""><a href="DP_notification.php"><i class="icon icon-bell"></i> <span class="text">Notification</span></a>
    </li>
    <li class=""><a title="" href="DP_setting.php"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="DP_index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="DP_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Assign<b class="caret"></b></span></a> 
      <ul>
        <li><a href="DP_assign.php"><i class="icon-plus"></i>Assign Police</a></li>
        <li><a href="DP_v_placement.php"><i class="icon-eye-open"></i>View Placement</a></li>
      </ul>
    </li>

    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-refresh"></i> <span>Progress Case<b class="caret"></b></span></a> 
      <ul>
        <li><a href="DP_r_case.php"><i class="icon-plus"></i>Register Case</a></li>
        <li><a href="DP_v_case.php"><i class="icon-eye-open"></i>View Case</a></li>
      </ul>

    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user-md"></i> <span> Accuser<b class="caret"></b></span></a>
      <ul>
        <li><a href="DP_r_accuser.php"><i class="icon-plus"></i>Register Accuser</a></li>
        <li><a href="DP_v_accuser.php"><i class="icon-eye-open"></i>View Accuser</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user-md"></i> <span>Accused<b class="caret"></b></span> </a>
      <ul>
        <li><a href="DP_r_accused.php"><i class="icon-plus"></i>Register Accused</a></li>
        <li><a href="DP_v_accussed.php"><i class="icon-eye-open"></i>View Accused</a></li>
      </ul>
    </li>
    <li class="active" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user-md"></i> <span>Witness<b class="caret"></b></span></a>
      <ul>
        <li class="active"><a href="DP_r_witness.php"><i class="icon-plus"></i>Register Witness</a></li>
        <li><a href="DP_v_witness.php"><i class="icon-eye-open"></i>View Witness</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-comments"></i> <span>Nomination<b class="caret"></b></span></a>
      <ul>
        <li><a href="DP_r_nomination.php"><i class="icon-plus"></i>Register Nomination</a></li>
        <li><a href="DP_v_nomination.php"><i class="icon-eye-open"></i>View Nomination</a></li>
      </ul>
    </li>

    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-file"></i> <span>Crime</span><b class="caret"></b></span></a>
    <ul>
        <li><a href="DP_r_crime.php"><i class="icon-plus"></i>Register Crime</a></li>
        <li><a href="DP_v_crime.php"><i class="icon-eye-open"></i>View Crime</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-pencil"></i> <span>Post</span><b class="caret"></b></span></a>
    <ul>
        <li><a href="DP_notice.php"><i class="icon-plus"></i>Post Notice</a></li>
        <li><a href="DP_v_notice.php"><i class="icon-eye-open"></i>View Notice</a></li>
      </ul>
    </li>
   
      <?php 
      $query = "SELECT role_id FROM auth_role where user_id='$user_id'";
      $result = mysqli_query($db, $query);

      echo '<ul>';
        while($row = mysqli_fetch_array($result)){
        $r_id=$row['role_id'];
        if ($r_id==2) 
        {
      echo '<li><a href="TPO_index.php"><i class="icon-signin"></i>Traffic Officer</a></li>';
        }
        else if ($r_id==3) 
        {
      echo '<li><a href="CPP_index.php"><i class="icon-signin"></i>Preventive Police</a></li>';
        }
        else if ($r_id==4)
        {
      echo '<li><a href="TP_index.php"><i class="icon-signin"></i>Traffic Police</a></li>';
        }
        else if ($r_id==5) 
        {
      echo '<li><a href="C_index.php"><i class="icon-signin"></i>Customer</a></li>';
        }
        }
      echo '</ul>';
     ?>
    </li>
  
  </ul>
</div>
<!--sidebar-menu-->
       

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="DP_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="DP_r_witness.php" class="current" >Register Witness</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
  <hr>
   <?php 
          $fname = $mname = $lname = $gender = $age =$nationality = $region = $zone = $woreda = $kebele = $mobile = $elevel = $mstatus = $religion = $job = $description = "";
          //variable for error
    $fname_err = $mname_err = $lname_err = $gender_err = $age_err =$nationality_err = $region_err = $zone_err = $woreda_err = $kebele_err = $mobile_err = $elevel_err = $mstatus_err = $religion_err = $job_err = $description_err = "";

    if (isset($_POST['save'])){

          $fname = mysqli_real_escape_string($db, $_POST['fname']);
          $mname = mysqli_real_escape_string($db, $_POST['mname']);
          $lname = mysqli_real_escape_string($db, $_POST['lname']);
          $gender = mysqli_real_escape_string($db, $_POST['gender']);
          $age = mysqli_real_escape_string($db, $_POST['age']);
          $job = mysqli_real_escape_string($db, $_POST['job']);
          $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
          $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
          $region = mysqli_real_escape_string($db, $_POST['region']);
          $zone = mysqli_real_escape_string($db, $_POST['zone']);
          $woreda = mysqli_real_escape_string($db, $_POST['woreda']);
          $kebele = mysqli_real_escape_string($db, $_POST['kebele']);
          $elevel = mysqli_real_escape_string($db, $_POST['elevel']);
          $mstatus = mysqli_real_escape_string($db, $_POST['mstatus']);
          $religion = mysqli_real_escape_string($db, $_POST['religion']);
          $description = mysqli_real_escape_string($db, $_POST['description']);


    if (empty ($_POST["fname"])) {  
        //array_push($fname_err, "You didn't enter the first name.");
      $fname_err = "You didn't enter the first name.";    
    } 

    else if (ctype_alpha(str_replace(' ', '', $fname)) === false) {
      $fname_err = "First name must contain letters and spaces only";
    }

    else if (empty ($_POST["mname"])) {  
    $mname_err = "You didn't enter the middle name.";    
    } 

    else if (ctype_alpha(str_replace(' ', '', $mname)) === false) {
      $mname_err = "Middle name must contain letters and spaces only";
    }

    else if (empty ($_POST["lname"])) {  
    $lname_err = "You didn't enter the last name.";    
    }    
   
   else if (ctype_alpha(str_replace(' ', '', $lname)) === false) {
      $lname_err = "Last name must contain letters and spaces only";
    }

    else if (empty ($_POST["gender"])) {  
    $gender_err = "You didn't select the gender.";    
    }

    else if (empty ($_POST["age"])) {  
    $age_err = "You didn't enter the age.";    
    }

    else if (!is_numeric($age)) {

      $age_err = "Age value only numeric!";

    }
    else if (empty ($_POST["job"])) {  
    $job_err = "You didn't enter the job.";    
    }

    else if (empty ($_POST["mobile"])) {  
    $mobile_err = "You didn't enter the mobile number.";    
    }

    else if (empty ($_POST["nationality"])) {  
        //array_push($fname_err, "You didn't enter the first name.");
      $nationality_err = "You didn't enter the Nationality.";    
    } 

    else if (ctype_alpha(str_replace(' ', '', $nationality)) === false) {
      $nationality_err = "Nationality must contain letters and spaces only";
    }

    else if (empty ($_POST["region"])) {  
        //array_push($fname_err, "You didn't enter the first name.");
      $region_err = "Select the region.";    
    } 

    else if (empty ($_POST["zone"])) {  
        //array_push($fname_err, "You didn't enter the first name.");
      $zone_err = "Select zone.";    
    } 

    else if (empty ($_POST["woreda"])) {  
        //array_push($fname_err, "You didn't enter the first name.");
      $woreda_err = "Select Woreda";    
    } 

    else if (empty ($_POST["kebele"])) {  
        //array_push($fname_err, "You didn't enter the first name.");
      $kebele_err = "Select Kebele";    
    } 

          // check if name only contains letters and whitespace  
    
    else if (empty ($_POST["elevel"])) {  
    $elevel_err = "You didn't enter the education level.";    
    } 

    else if (ctype_alpha(str_replace(' ', '', $elevel)) === false) {
      $elevel_err = "Education level must contain letters and spaces only";
    }

    else if (empty ($_POST["mstatus"])) {  
    $mstatus_err = "Select marginal status!.";    
    }

    else if (empty ($_POST["religion"])) {  
    $religion_err = "You didn't enter the religion.";    
    } 

    else if (ctype_alpha(str_replace(' ', '', $religion)) === false) {
      $religion_err = "Religion must contain letters and spaces only";
    }

    else if(empty($_POST['description'])){
        $description_err = "Crime case must be describe!";
     }

          $query = "INSERT INTO witness (fname, mname, lname, gender, age, mobile, nationality, region, zone, woreda, kebele, elevel, mstatus, religion, job, description) VALUES ('$fname', '$mname', '$lname', '$gender', '$age', '$mobile', '$nationality', '$region', '$zone', '$woreda', '$kebele', '$elevel', '$mstatus', '$religion', '$job', '$description')";
          if( mysqli_query($db, $query)) {
            echo "<h3>Registration Success!</h3> ";
          }
          else {
            echo "<h3>Registration UnSuccess!</h3> ";
          }
          
    }
        ?> 
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register Witness</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="DP_r_witness.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="fname" placeholder="First name" />
                <br>
                 <span class="error"><?php echo $fname_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Middle Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="mname" placeholder="Middle name" />
                <br>
                 <span class="error"><?php echo $mname_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="lname" placeholder="Last name" />
                <br>
                 <span class="error"><?php echo $lname_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Gender</label>
              <div class="controls">
                <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
                <input type="radio" name="gender" value="other"> Other
                <br>
                 <span class="error"><?php echo $gender_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Age :</label>
              <div class="controls">
                <input type="text" class="span11" name="age" placeholder="Age" />
                <br>
                 <span class="error"><?php echo $age_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile :</label>
              <div class="controls">
                <input type="text" class="span11" name="mobile" placeholder="Mobile" />
                <br>
                 <span class="error"><?php echo $mobile_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nationality :</label>
              <div class="controls">
                <input type="text" class="span11" name="nationality" placeholder="Nationality" />
                <br>
                 <span class="error"><?php echo $nationality_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Region :</label>
              <div class="controls">
                <select name="region" id="region " class="span11">
                  <option value="" disabled selected>--Select Region--</option>
                  <?php 
                    $query = "SELECT * FROM region order by id";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $region_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Zone :</label>
              <div class="controls">
              <select name="zone" id="zone " class="span11">
                  <option value="" disabled selected>--Select Zone--</option>
                  <?php 
                    $query = "SELECT * FROM zone order by id";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $zone_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Wereda :</label>
              <div class="controls">
              <select name="woreda" id="woreda " class="span11">
                  <option value="" disabled selected>--Select Woreda--</option>
                  <?php 
                    $query = "SELECT * FROM woreda order by id";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $woreda_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kebele :</label>
              <div class="controls">
              <select name="kebele" id="kebele" class="span11">
                  <option value="" disabled selected>--Select Kebele--</option>
                  <?php 
                    $query = "SELECT * FROM kebele order by id";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $kebele_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Educational Level :</label>
              <div class="controls">
                <input type="text" class="span11" name="elevel" placeholder="Educational level" />
                <br>
                 <span class="error"><?php echo $elevel_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Marginal Status :</label>
              <div class="controls">
                <select class="span11" name="mstatus" id="mstatus">
                  <option value="" disabled selected>--Select Status--</option>
                  <option>Single</option>
                  <option>Married</option>
                  <option>Divorced</option>
                  <br>
                   <span class="error"><?php echo $mstatus_err; ?></span>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Religion :</label>
              <div class="controls">
                <input type="text" class="span11" name="religion" placeholder="Religion" />
                <br>
                 <span class="error"><?php echo $religion_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Job :</label>
              <div class="controls">
                <input type="text" class="span11" name="job" placeholder="Job" />
                <br>
                 <span class="error"><?php echo $job_err; ?></span>
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea class="span11" name="description" placeholder="Description"></textarea>
                <br>
                 <span class="error"><?php echo $description_err; ?></span>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="save" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
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
