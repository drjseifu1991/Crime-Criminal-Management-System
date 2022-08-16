<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ; 
    if($_SESSION['role_id']!=9){
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
<link rel="stylesheet" href="css/4/bootstrap.min.css" />
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
  <li><a href="IN_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Question<b class="caret"></b></span></a> 
      <ul>
        <li class="active"><a href="IN_r_question.php"><i class="icon-plus"></i>Ask Question</a></li>
        <li><a href="IN_v_question.php"><i class="icon-eye-open"></i>View Question</a></li>
      </ul>
    </li>
    <li class="active" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Insurance Members<b class="caret"></b></span></a> 
      <ul>
        <li class="active"><a href="IN_r_member.php"><i class="icon-plus"></i>Add Member</a></li>
        <li><a href="IN_v_member.php"><i class="icon-eye-open"></i>View Member</a></li>
      </ul>
    </li>
    <li><a href="IN_v_report.php"><i class="icon icon-home"></i> <span>View Report</span></a> </li>
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
 
  <div class="container-fluid" style="margin-top: 1.5rem;">
  <?php
    
    $vehicle_owner = $vehicle_type = $vehicle_board_no = $vehicle_owner_err = $vehicle_type_err = $vehicle_board_no_err = " ";
    if(isset($_POST['save'])) {
        $vehicle_owner = mysqli_real_escape_string($db, $_POST['vehicle_owner']);
        $vehicle_type = mysqli_real_escape_string($db, $_POST['vehicle_type']);
        $vehicle_board_no = mysqli_real_escape_string($db, $_POST['vehicle_board_no']);

    if(empty($_POST['vehicle_owner'])) {
        $vehicle_owner_err = "Please enter the title!";
    }

    else if (empty($_POST['vehicle_type'])) {
        $vehicle_type_err = "Please enter the Description!";
    }
    else if (empty($_POST['vehicle_board_no'])) {
        $vehicle_board_no_err = "Please enter the Description!";
    }
    else {
        $query = "INSERT INTO insurance (vehicle_owner, vehicle_type, vehicle_board_no) VALUES ('$vehicle_owner', '$vehicle_type', '$vehicle_board_no')";
        if(mysqli_query($db, $query)) {
            echo "Vehicle owner added to insurance successfully.";
        }
        else {
            echo "Vehicle owner not added to insurance successfully.";
        }
    }
}
  ?>
  
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Insurance Member</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="IN_r_member.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Vehicle Owner</label>
              <div class="controls">
                <textarea class="span11" name="vehicle_owner" placeholder="Vehicle Owner"></textarea>
                <br>
                 <span class="error"><?php echo $vehicle_owner_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Vehicle Type</label>
              <div class="controls">
                <textarea class="span11" name="vehicle_type" placeholder="Vehicle Type"></textarea>
                <br>
                 <span class="error"><?php echo $vehicle_type_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Vehicle Board Number</label>
              <div class="controls">
                <textarea class="span11" name="vehicle_board_no" placeholder="Vehicle Board Number"></textarea>
                <br>
                 <span class="error"><?php echo $vehicle_board_no_err; ?></span>
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
