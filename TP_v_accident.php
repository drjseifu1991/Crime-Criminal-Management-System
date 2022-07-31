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
        <li><a href="TP_r_accident.php"><i class="icon-plus"></i>Register Accident</a></li>
        <li class="active"><a href="TP_v_accident.php"><i class="icon-eye-open"></i>View Accident</a></li>
      </ul>
    </li>
  
    <li><a href="TP_v_nomination.php"><i class="icon icon-eye-open"></i>View Nomination</a></li>
    <li><a href="TP_v_nomination.php"><i class="icon icon-eye-open"></i>Generate Accident Report</a></li>
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
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="TP_index.php" class="current"><i class="icon-home"></i> Home</a><a href="TP_v_accident.php" class="current">View Accident</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12" >
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Accident</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Vihecle Owner</th>
                  <th>Driver Licence Number</th>
                  <th>Vihecle Board Number</th>
                  <th>Accident Date</th>
                  <th>Crime Type</th>
                  <th>Crime Level</th>
                  <th>Punishment Type</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">

              <?php 
              $query = "SELECT * FROM accident where session=$user_id ORDER BY id ";
              $result = mysqli_query($db, $query);

              while($row = mysqli_fetch_array($result))
              {
              ?>
                  <td><?php echo $row['funame_vihecle_owner'] ?></td>
                  <td><?php echo $row['driver_licence'] ?></td>
                  <td><?php echo $row['vehicle_board_no'] ?></td>
                  <td><?php echo $row['accident_date'] ?></td>
                  <td><?php echo $row['crime_type'] ?></td>
                  <td><?php echo $row['crime_level'] ?></td>
                  <td><?php echo $row['punishment_type']?></td>
                  <td><?php echo $row['description']?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
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
