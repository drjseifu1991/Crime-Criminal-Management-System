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
  h3{
    color: green;
  }
</style>

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
    <li  class="" ><a title="" href="DP_profile.php">  <span class="profile"><?php  echo $_SESSION['uname']; ?></span></a>
    </li>
    <li class=""><a href="DP_notification.php"><i class="icon icon-bell"></i> <span class="text">Notification</span></a>
    </li>
    <li class=""><a title="" href="DP_setting.php"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
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
<div id="sidebar"><a href="DP_index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
  
  <li><a href="DP_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Order<b class="caret"></b></span></a> 
      <ul>
        <li><a href="DP_o_police.php"><i class="icon-plus"></i>Order Police</a></li>
        <li><a href="DP_v_order.php"><i class="icon-eye-open"></i>View Order</a></li>
      </ul>
    </li>

    <li class="active" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-refresh"></i> <span>Progress Case<b class="caret"></b></span></a> 
      <ul>
        <li class="active"><a href="DP_r_case.php"><i class="icon-plus"></i>Register Case</a></li>
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
        <li><a href="DP_v_accused.php"><i class="icon-eye-open"></i>View Accused</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user-md"></i> <span>Witness<b class="caret"></b></span></a>
      <ul>
        <li><a href="DP_r_witness.php"><i class="icon-plus"></i>Register Witness</a></li>
        <li><a href="DP_v_witness.php"><i class="icon-eye-open"></i>View Witness</a></li>
      </ul>
    </li>
    <li><a href="DP_v_criminal.php"><i class="icon icon-home"></i> <span>View Criminal</span></a> </li>
    <li><a href="DP_v_complain.php"><i class="icon icon-home"></i> <span>View Complain</span></a> </li>
    <li><a href="DP_v_accusation.php"><i class="icon icon-home"></i> <span>View Accusation</span></a> </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user-md"></i> <span>Report<b class="caret"></b></span></a>
      <ul>
      <li><a href="DP_g_report.php"><i class="icon-plus"></i>Generate Report</a></li>
        <li><a href="DP_v_report.php"><i class="icon-eye-open"></i>View Report</a></li>
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
    <div id="breadcrumb"> <a href="DP_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="DP_r_case.php" class="current" >Register Case</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
  <hr>
  <?php
   $accused_id = $appo_date = $description = $crime_type="";
   $accused_id_err = $app_date_err = $description_err = $crime_type_err= "";

   if (isset($_POST['save'])){

        $accused_id = mysqli_real_escape_string($db, $_POST['accused_id']);
        $appo_date = mysqli_real_escape_string($db, $_POST['appo_date']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $crime_type = mysqli_real_escape_string($db, $_POST['crime_type']);
        $session=$_SESSION['user_id'];

        //validation

        if(empty($_POST['crime_id'])){
          $accused_id_err = "Select Accused!";
        }
        if(empty($_POST['crime_type'])){
          $crime_type_err = "Insert Crime Type!";
        }
        if(empty($_POST['appo_date'])){
          $app_date_err = "Select appointment date and time!";
        }

        if(empty($_POST['description'])){
          $description_err = "Enter best description about crime!";
        }

        else{
          $query = "INSERT INTO progress_case (accused_id, appo_date, description, crime_type) VALUES ('$accused_id', '$appo_date', '$description', '$crime_type')";
          if(mysqli_query($db, $query)) {
            echo "<h3>Registration Success!</h3> ";
          }
          else {
            echo "<h3>Registration Not Success!</h3> ";
          }
          
        }
   }
 ?>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register progress case</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="DP_r_case.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Accused :</label>
              <div class="controls">
                <select name="accused_id" id="accused_id " class="span11">
                   <?php 
                    $query = "SELECT * FROM accused";
                   $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['fname'] ." ".$row['mname']."-". "(". $row['id'].")"; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $accused_id_err; ?></span>
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
              <label class="control-label">Appointment Date :</label>
              <div class="controls">
                <input type="date" class="span11" name="appo_date" placeholder="Appointment date" />
                <br>
                 <span class="error"><?php echo $app_date_err; ?></span>
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
              <button type="submit" name="save" id="save" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>/
</div>

</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2022 &copy; Bahirdar University(BiT) Computer Engineering <a href="http://www.bdu.edu.et">www.bdu.edu.et</a> </div>
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
