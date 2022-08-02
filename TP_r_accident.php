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
  h3{
    color: green;
    font-style: bold;
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
    <li  class="" ><a title="" href="TP_profile.php"><span class="profile"><?php  echo $_SESSION['uname']; ?></span></a>
    </li>
    <li class=""><a href="TP_notification.php"><i class="icon icon-bell"></i> <span class="text">Notification</span></a>
    </li>
    <li class=""><a title="" href="TP_setting.php"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
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
<div id="sidebar"><a href="TP_index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
<ul>
    <li><a href="TP_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="TP_placement.php"><i class="icon icon-map-marker"></i> <span>View Placement</span></a></li>
    <li class="dropdown active"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-exclamation-sign"></i> <span>Accident<b class="caret"></b></span></a> 
      <ul>
        <li class="active"><a href="TP_r_accident.php"><i class="icon-plus"></i>Register Accident</a></li>
        <li><a href="TP_v_accident.php"><i class="icon-eye-open"></i>View Accident</a></li>
      </ul>
    </li>
  
    <li><a href="TP_v_nomination.php"><i class="icon icon-eye-open"></i>View Nomination</a></li>
    <li><a href="TP_g_report.php"><i class="icon icon-eye-open"></i>Generate Accident Report</a></li>
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

        else if ($r_id==2)
        {
      echo '<li><a href="TPO_index.php"><i class="icon-signin"></i>Traffic Officer</a></li>';
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
    <div id="breadcrumb"> <a href="TPO_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="TPO_r_accident.php" class="current" >Register Accident</a></div>
  </div>
<div class="container-fluid">
  <hr>
  <?php 
    $vehicle_owner = $vehicle_owner_err = $driver_licence = $driver_licence_err = $date_time = $date_time_err ="";
    $vehicle_board = $vehicle_board_err = $crime_type = $crime_type_err = $crime_level = $crime_level_err = $punishment_type = $punishment_type_err = $description = $description_err = "";

    if(isset($_POST['save'])){
      $vehicle_owner = mysqli_real_escape_string($db, $_POST['vehicle_owner']);
      $driver_licence = mysqli_real_escape_string($db, $_POST['driver_licence']);
      $date_time = mysqli_real_escape_string($db, $_POST['date_time']);
      $vehicle_board = mysqli_real_escape_string($db, $_POST['vehicle_board']);
      $crime_type = mysqli_real_escape_string($db, $_POST['crime_type']);
      $crime_level = mysqli_real_escape_string($db, $_POST['crime_level']);
      $punishment_type = mysqli_real_escape_string($db, $_POST['punishment_type']);
      $description = mysqli_real_escape_string($db, $_POST['description']);

      if(empty($_POST['vehicle_owner'])){
          $vehicle_owner_err = "Enter Vehicle Owner.";
      }

      else if(empty($_POST['driver_licence'])){
          $driver_licence_err = "Enter Driver Licence Number.";
      }
      else if(empty($_POST['date_time'])){
          $date_time_err = "Enter Accident date.";

      }
      else if(empty($_POST['vehicle_board'])){
          $vehicle_board_err = "Enter Vehicle Board Number.";

      }
      else if(empty($_POST['crime_type'])){
        $crime_type_err = "Enter Crime Type.";

      }
      else if(empty($_POST['crime_level'])){
        $crime_level_err = "Enter Crime Level.";

      } 
      else if(empty($_POST['punishment_type'])){
        $punishment_type_err = "Enter Punishment Type";

      } 
      else if(empty($_POST['description'])){
          $description_err = "Enter description.";

      }

      else{
        $user_id=$_SESSION['user_id'];
        $query = "INSERT INTO accident (funame_vihecle_owner, driver_licence, vehicle_board_no, crime_level, accident_date, crime_type, session, punishment_type, description) VALUES ('$vehicle_owner', '$driver_licence', '$vehicle_board', '$crime_level', '$date_time', '$crime_type', '$user_id', '$punishment_type', '$description')";
        if(mysqli_query($db, $query)) {
          echo "<h3>Accident Registaration Sucessful</h3>";
        }
        else {
          echo "<h3>Accident Registration Not Successful!</h3>";
        }
        
      }
    }
  ?>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register Accident</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="TP_r_accident.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Full name of Vehicle owner :</label>
              <div class="controls">
                <input type="text" class="span11" name="vehicle_owner" placeholder="Vehicle Owner" />
                <br>
                 <span class="error"><?php echo $vehicle_owner_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Driver Licence Number :</label>
              <div class="controls">
                <input type="text" class="span11" name="driver_licence" placeholder="Driver Licence Number" />
                <br>
                 <span class="error"><?php echo $driver_licence_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Accident committed date and time :</label>
              <div class="controls">
                <input type="date" class="span11" name="date_time" placeholder="Date and Time" />
                <br>
                 <span class="error"><?php echo $date_time_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Vehicle Board Number :</label>
              <div class="controls">
                <input type="text" class="span11" name="vehicle_board" placeholder="Vehicle Board Number" />
                <br>
                 <span class="error"><?php echo $vehicle_board_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Crime Type :</label>
              <div class="controls">
                <input type="text" class="span11" name="crime_type" placeholder="Crime Type" />
                <br>
                 <span class="error"><?php echo $crime_type_err; ?></span>
              </div>
            </div>    
            <div class="control-group">
              <label class="control-label">Crime Level :</label>
              <div class="controls">
                <input type="text" class="span11" name="crime_level" placeholder="Crime Level" />
                <br>
                 <span class="error"><?php echo $crime_level_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Punishment Type :</label>
              <div class="controls">
                <input type="text" class="span11" name="punishment_type" placeholder="Punishment Type" />
                <br>
                 <span class="error"><?php echo $punishment_type_err; ?></span>
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
