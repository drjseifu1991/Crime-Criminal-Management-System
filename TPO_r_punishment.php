<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ; 
    if($_SESSION['role_id']!=2 && $_SESSION['role_id']!=4){
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
  }
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
    <li  class="" ><a title="" href="TPO_profile.php"><span class="profile"><?php  echo $_SESSION['uname']; ?></span></a>
    </li>
    <li><a href="TPO_notification.php"><i class="icon icon-bell"></i> <span class="text">Notification</span></a>
    </li>
    <li class=""><a title="" href="TPO_setting.php"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
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
<div id="sidebar"><a href="TPO_index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="TPO_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Assign<b class="caret"></b></span></a> 
      <ul>
        <li><a href="TPO_assign.php"><i class="icon-plus"></i>Assign Trafic Police</a></li>
        <li><a href="TPO_v_placement.php"><i class="icon-eye-open"></i>View Placement</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-exclamation-sign"></i> <span>Accident<b class="caret"></b></span> </a>
      <ul>
        <li><a href="TPO_r_accident.php"><i class="icon-plus"></i>Register Accident</a></li>
        <li><a href="TPO_v_accident.php"><i class="icon-eye-open"></i>View Accident</a></li>
      </ul>
    </li>
    <li class="active" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-refresh"></i> <span>Punishment<b class="caret"></b></span></a> 
      <ul>
        <li class="active"><a href="TPO_r_punishment.php"><i class="icon-plus"></i>Register Punishment</a></li>
        <li><a href="TPO_v_punishment.php"><i class="icon-eye-open"></i>View Punishment</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-comments"></i> <span>Nomination<b class="caret"></b></span> </a>
      <ul>
        <li><a href="TPO_r_nomination.php"><i class="icon-plus"></i>Register Nomination</a></li>
        <li><a href="TPO_v_nomination.php"><i class="icon-eye-open"></i>View Nomination</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-pencil"></i> <span>Post<b class="caret"></b></span></a>
      <ul>
        <li><a href="TPO_notice.php"><i class="icon-plus"></i>Post Notice</a></li>
        <li><a href="TPO_v_notice.php"><i class="icon-eye-open"></i>View Notice</a></li>
      </ul>
    </li>

     
      <?php 
      $query = "SELECT role_id FROM auth_role where user_id='$user_id'";
      $result = mysqli_query($db, $query);

      echo '<ul>';
        while($row = mysqli_fetch_array($result)){
        $r_id=$row['role_id'];
        if ($r_id==1) 
        {
      echo '<li><a href="DP_index.php"><i class="icon-signin"></i>Detective Police</a></li>';
        }

        else if ($r_id==4)
        {
      echo '<li><a href="TP_index.php"><i class="icon-signin"></i>Traffic Police</a></li>';
        }
        else if ($r_id==3) 
        {
      echo '<li><a href="CPP_index.php"><i class="icon-signin"></i>Preventive Police</a></li>';
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
    <div id="breadcrumb"> <a href="TPO_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="TPO_v_punishment.php" class="current" >Punishiment</a></div>
  </div>

  <?php 
          $fname =$lname = $person_id = $car_type = $case_type = $car_id = $adate = $amount = $description = "";
                //variable for error
          $fname_err  = $lname_err = $person_err = $case_type_err = $car_type_err = $car_id_err = $date_err 
          = $amount_err = $description_err = "";

          if (isset($_POST['save'])){

                $fname = mysqli_real_escape_string($db, $_POST['fname']);
                $lname = mysqli_real_escape_string($db, $_POST['lname']);
                $person_id = mysqli_real_escape_string($db, $_POST['person_id']);
                $car_type = mysqli_real_escape_string($db, $_POST['car_type']);
                $case_type = mysqli_real_escape_string($db, $_POST['case_type']);
                $car_id = mysqli_real_escape_string($db, $_POST['car_id']);
                $adate = mysqli_real_escape_string($db, $_POST['adate']);
                $amount = mysqli_real_escape_string($db, $_POST['amount']);
                $description = mysqli_real_escape_string($db, $_POST['description']);
                $session=$_SESSION['user_id'];


          if (empty ($_POST["fname"])) {  
              //array_push($fname_err, "You didn't enter the first name.");
            $fname_err = "You didn't enter the first name.";    
          } 

          else if (ctype_alpha(str_replace(' ', '', $fname)) === false) {
            $fname_err = "First name must contain letters and spaces only";
          }

          else{}
          if (empty ($_POST["lname"])) {  
          $lname_err = "You didn't enter the last name.";    
          }    
         
         else if (ctype_alpha(str_replace(' ', '', $lname)) === false) {
            $lname_err = "Last name must contain letters and spaces only";
          }
          else{}

          if (empty ($_POST["person_id"])) {  
          $person_err = "You didn't enter the person id.";    
          }

          if (empty ($_POST["car_id"])) {  
          $car_id_err = "You didn't enter the car id.";    
          }

          if (empty ($_POST["car_type"])) {  
          $car_type_err = "You didn't enter the car type.";    
          }
          if (empty ($_POST["adate"])) {  
          $date_err = "You didn't enter the date.";    
          }

          if (empty ($_POST["car_type"])) {  
          $case_type_err = "You didn't enter the case type.";    
          } 

          if (empty ($_POST["amount"])) {  
          $amount_err = "You didn't enter the amount.";    
          } 


          if(empty($_POST['description'])){
              $description_err = "Accident case must be describe!";
           }

                $query = "INSERT INTO penality (fname, lname, person_id, car_type,  car_id, case_type, penality_date, amount, description, session) VALUES ('$fname', '$lname', '$person_id', '$car_type',  '$car_id', '$case_type', '$adate', '$amount','$description', '$session')";
                mysqli_query($db, $query);
          }
        ?>
<!--End-breadcrumbs-->
 <div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register Punishiment</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="TPO_r_punishment.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="fname" placeholder="First name" />
                <br>
                 <span class="error"><?php echo $fname_err; ?></span>
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
              <label class="control-label">Person ID :</label>
              <div class="controls">
                <input type="text" class="span11" name="person_id" placeholder="Person ID" />
                <br>
                 <span class="error"><?php echo $person_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Case Type :</label>
              <div class="controls">
                <input type="text" class="span11" name="case_type" placeholder="Case Type" />
                <br>
                 <span class="error"><?php echo $case_type_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Car Type :</label>
              <div class="controls">
                <input type="text" class="span11" name="car_type" placeholder="Car Type" />
                <br>
                 <span class="error"><?php echo $car_type_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Car ID :</label>
              <div class="controls">
                <input type="text" class="span11" name="car_id" placeholder="Car ID" />
                <br>
                 <span class="error"><?php echo $car_id_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date :</label>
              <div class="controls">
                <input type="date" class="span11" name="adate" placeholder="Date" />
                <br>
                 <span class="error"><?php echo $date_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Amount :</label>
              <div class="controls">
                <input type="text" class="span11" name="amount" placeholder="Amount" />
                <br>
                 <span class="error"><?php echo $amount_err; ?></span>
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
