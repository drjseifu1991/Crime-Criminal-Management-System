<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ; 
    if($_SESSION['role_id']!=5){
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
<style>
      .widget-content  {
        overflow-y: auto;
        height: 106px;
      }
      .widget-content thead th {
        position: sticky;
        top: 0;
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th,
      td {
        padding: 8px 16px;
        border: 1px solid #ccc;
      }
      th {
        background: #eee;
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
<div id="sidebar"><a href="C_index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="C_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="C_new.php"><i class="icon icon-eye-open"></i> <span>Notice</span></a></li>

    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-exclamation-sign"></i> <span>Nomination<b class="caret"></b></span></a> 
      <ul>
        <li><a href="C_r_nomination.php"><i class="icon-plus"></i>Register Nomination</a></li>
        <li><a href="C_v_nomination.php"><i class="icon-eye-open"></i>View Nomination</a></li>
      </ul>
    </li>

    <li><a href="C_appointment.php"><i class="icon icon-refresh"></i> <span>View Appointment</span></a></li>
    <li class="active"><a href="C_phone.php"><i class="icon icon-phone-sign"></i> <span>Placement</span></a></li>

  
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="C_index.php"><i class="icon-home"></i> Home</a><a href="C_phone" class="current">Phone Number</a> </div>
  </div>
<!--End-breadcrumbs-->

<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12" >
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Placement history</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Kebele Name</th>
                  <th>Place Name</th>
                  <th>Starting time</th>
                  <th>Finishing time</th>
                  <th>Registration time</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">

              <?php 

              $query = "SELECT * FROM place_history ORDER BY id ASC";
              $result = mysqli_query($db, $query) or die( mysqli_error($db));

              while($row = mysqli_fetch_array($result))
              {
                $place_history_id = $row['up_id'];
                $query_place = "SELECT * FROM user_place WHERE id = $place_history_id";
                $result_place = mysqli_query($db, $query_place) or die( mysqli_error($db));
                if($row_place = mysqli_fetch_array($result_place)) {
                  $user_id_place = $row_place['user_id'];
                  $place_id_place = $row_place['place_id'];
                  $query_user = "SELECT * FROM users WHERE id = $user_id_place";
                  $user_result = mysqli_query($db, $query_user) or die( mysqli_error($db));
                  $user_row = mysqli_fetch_array($user_result);
                  $query_place = "SELECT * FROM placement WHERE id = $place_id_place";
                  $place_result = mysqli_query($db, $query_place) or die( mysqli_error($db));
                  $place_row = mysqli_fetch_array($place_result);
                }
              ?>
                  <td><?php echo $row['id']?></td>
                  <td><?php echo $user_row['fname']?></td>
                  <td><?php echo $user_row['mname']?></td>
                  <td><?php echo $user_row['lname']?></td>
                  <td><?php echo $place_row['kebele']?></td>
                  <td><?php echo $place_row['place']?></td>
                  <td><?php echo $row_place['stime']?></td>
                  <td><?php echo $row_place['ftime']?></td>
                  <td><?php echo $row_place['rtime']?></td>
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
