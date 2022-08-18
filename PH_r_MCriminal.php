<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ; 
    if($_SESSION['role_id']!=6){
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
  h3{color: green;
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
    <li  class="" ><a title="" href="CPP_profile.php"><span class="profile"><?php  echo $_SESSION['uname']; ?></span></a>
    </li>
    <li class=""><a href="CPP_notification.php"><i class="icon icon-bell"></i> <span class="text">Notification</span></a>
    </li>
    <li class=""><a title="" href="CPP_setting.php"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
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
<div id="sidebar"><a href="PH_index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <<li><a href="PH_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Assign<b class="caret"></b></span></a> 
      <ul>
        <li><a href="PH_assign.php"><i class="icon-plus"></i>Assign Police</a></li>
        <li><a href="PH_placement.php"><i class="icon-eye-open"></i>View Placement</a></li>
      </ul>
    </li>
    <li><a href="PH_v_employee.php"><i class="icon icon-home"></i> <span>View Employee</span></a> </li>
    <li><a href="PH_v_comment.php"><i class="icon icon-home"></i> <span>View Comment</span></a> </li>
    <li><a href="PH_v_nomination.php"><i class="icon icon-home"></i> <span>View Nomination</span></a> </li>
    <li class="active"><a href="PH_r_MCriminal.php"><i class="icon icon-home"></i> <span>Post Missing Criminal</span></a> </li>
    <li><a href="PH_v_r_accident.php"><i class="icon icon-home"></i> <span>View Traffic Accident Report</span></a> </li>
    <li><a href="PH_v_r_crime.php"><i class="icon icon-home"></i> <span>View Criminal Report</span></a> </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Presecuter<b class="caret"></b></span></a> 
      <ul>
        <li><a href="PH_v_p_question.php"><i class="icon-plus"></i>View Question</a></li>
        <li><a href="PH_r_p_report.php"><i class="icon-eye-open"></i>Send Report</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Insurance<b class="caret"></b></span></a> 
      <ul>
        <li><a href="PH_v_i_question.php"><i class="icon-plus"></i>View Question</a></li>
        <li><a href="PH_r_i_report.php"><i class="icon-eye-open"></i>Send Report</a></li>
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
        else if ($r_id==1) 
        {
      echo '<li><a href="DP_index.php"><i class="icon-signin"></i>Detective Police</a></li>';
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
    <div id="breadcrumb"> <a href="DP_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="DP_r_nomination.php" class="current" >Register Nomination</a></div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
  <hr>
        
  <?php 
$fname = $lname= $city = $kebele = $datetime = $files = $description = $session1 = "";
$fname_err = $lname_err = $city_err = $kebele_err = $datetime_err = $description_err = "";

if (isset($_POST['save'])){
        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $city = mysqli_real_escape_string($db, $_POST['city']);
        $kebele = mysqli_real_escape_string($db, $_POST['kebele']);
        $datetime = mysqli_real_escape_string($db, $_POST['datetime']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $directory = "uploads/";
        $file = $directory.basename($_FILES['files']['name']);
        if(move_uploaded_file($_FILES['files']['tmp_name'], $file)){
          $file = basename($_FILES['files']['name']);
        }
        else{
          $file = "";
        }
        //validation
        if(empty($_POST['fname'])){
          $fname_err = "Enter Criminal First Name";
        }

        else if(empty($_POST['lname'])){
          $lname_err = "Enter Criminal Last Name";

        }

        else if(empty($_POST['city'])){
          $city_err = "Enter City name";
        }

        else if(empty($_POST['kebele'])){
            $kebele_err = "Occurance place must be fill.";
        }

        else if(empty($_POST['datetime'])){
          $date_type_err = "Enter Crime Type";
        }

        else if(empty($_POST['description'])){
          $description_err = "Enter detail about nomination.";
        }

        else{
          $user_id=$_SESSION['user_id'];
          $query = "INSERT INTO missing_criminal (fname, lname, photo, city, kebele, date, description, user_id) VALUES ('$fname', '$lname', '$file', '$city', '$kebele', '$datetime', '$description', '$user_id')";
          if(mysqli_query($db, $query)) {
            echo "      Missing Criminal posted successfully";
          }
          else {
            echo "      Missing Criminal doesn't posted successfully";
          }
        }


}

?>
  <div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Post Missing Criminal</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="PH_r_MCriminal.php" enctype="multipart/form-data" method="POST" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">First Name :</label>
                <div class="controls">
                    <input type="text" class="span11" name="fname" placeholder="First Name" />
                    <br>
                    <span class="error"><?php echo $fname_err; ?></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Last Name :</label>
                <div class="controls">
                    <input type="text" class="span11" name="lname" placeholder="Last Name" />
                    <br>
                    <span class="error"><?php echo $lname_err; ?></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">City :</label>
                <div class="controls">
                    <input type="text" class="span11" name="city" placeholder="City" />
                    <br>
                    <span class="error"><?php echo $city_err; ?></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Kebele :</label>
                <div class="controls">
                    <input type="text" class="span11" name="kebele" placeholder="Kebele" />
                    <br>
                    <span class="error"><?php echo $kebele_err; ?></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Date :</label>
                <div class="controls">
                    <input type="date" class="span11" name="datetime" placeholder="Date" />
                    <br>
                    <span class="error"><?php echo $datetime_err; ?></span>
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Attach Photo</label>
              <div class="controls">
                <input type="file" name="files" />
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
