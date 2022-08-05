<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ; 
    if($_SESSION['role_id']!=3){
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
<li><a href="CPP_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="CPP_placement.php"><i class="icon icon-map-marker"></i> <span>View Placement</span></a></li>
     <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-comments"></i> <span>Nomination<b class="caret"></b></span></a> 
      <ul>
        <li><a href="CPP_r_nomination.php"><i class="icon-plus"></i>Register Nomination</a></li>
        <li><a href="CPP_v_nomination.php"><i class="icon-eye-open"></i>View Nomination</a></li>
      </ul>

    </li>
    
    <li><a href="CPP_r_criminal.php"><i class="icon icon-file"></i> <span>Register Criminal</span></a></li>
    <li><a href="CPP_v_order.php"><i class="icon icon-file"></i> <span>View Order</span></a></li>
    <li class="active"><a href="CPP_g_report.php"><i class="icon icon-file"></i> <span>Generate Crime Report</span></a></li>
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
    $case = $case_err = $date_time = $date_time_err = $description = $description_err="";

    if(isset($_POST['save'])){
      $case = mysqli_real_escape_string($db, $_POST['case']);
      $date_time = mysqli_real_escape_string($db, $_POST['date_time']);
      $description = mysqli_real_escape_string($db, $_POST['description']);
      $directory = "uploads/";
        $file = $directory.basename($_FILES['files']['name']);
        if(move_uploaded_file($_FILES['files']['tmp_name'], $file)){
          $file = basename($_FILES['files']['name']);
        }
        else{
          $file = "";
        }

      if(empty($_POST['case'])){
          $case_err = "Enter Case";
      }

      else if(empty($_POST['date_time'])){
          $date_time_err = "Enter Accident date.";

      }
      else if(empty($_POST['description'])){
          $description_err = "Enter description.";

      }

      else{
        $user_id=$_SESSION['user_id'];
        $query = "INSERT INTO report (r_case, r_desc, r_date_time, r_type, r_level, file_r, user_id) VALUES ('$case', '$description', '$date_time', 'crime', 'low', '$file', '$user_id')";
        // $query = "INSERT INTO criminal (fname, lname, city, kebele, crime_type, crime_level, description, file, user_id) VALUES ('$fname', '$lname', '$city', '$kebele', '$crime_type', '$crime_level', '$description', '$files', '$user_id')";
        if(mysqli_query($db, $query)) {
          echo "<h3>Report Generrated Sucessful</h3>";
        }
        else {
          echo "<h3>Report Doesn't Generated Successful!</h3>";
        }
        
        
      }
    }
  ?>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Generate Report</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="CPP_g_report.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Case of Report :</label>
              <div class="controls">
                <input type="text" class="span11" name="case" placeholder="Case of Report" />
                <br>
                 <span class="error"><?php echo $case_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Date and time :</label>
              <div class="controls">
                <input type="date" class="span11" name="date_time" placeholder="Date and Time" />
                <br>
                 <span class="error"><?php echo $date_time_err; ?></span>
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
            <div class="control-group">
              <label class="control-label">Attach File</label>
              <div class="controls">
                <input type="file" name="files" />
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
