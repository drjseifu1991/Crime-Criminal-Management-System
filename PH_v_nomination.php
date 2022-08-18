<?php  
  session_start();
  if($_SESSION['uname']){
  $user_id=$_SESSION['user_id'] ;
  $date_timee = ""; 
    if($_SESSION['role_id']!=6){
      unset($_SESSION['uname']);
      unset($_SESSION['role_id']);
      header("location: login.php");  

    }
  }
  else{
    header("location: login.php");
  }

include 'Connection.php';

  // if(isset($_GET['id'])){
  //   $date_timee = $_GET['date_time'];
  // }
  if (isset($_POST['search'])){
    $date_time = mysqli_real_escape_string($db, $_POST['date_time']);
    header("location: PH_v_nomination_search.php?date_time=$date_time");
  }
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
<div id="search">
  <form action="PH_v_nomination_search.php" method="post" class="form-horizontal">
  <input type="datetime-local" name="date_time" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" name="search" title="Search"><i class="icon-search icon-white"></i></button>
  </form>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="PH_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<ul>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Assign<b class="caret"></b></span></a> 
      <ul>
        <li><a href="PH_assign.php"><i class="icon-plus"></i>Assign Police</a></li>
        <li><a href="PH_placement.php"><i class="icon-eye-open"></i>View Placement</a></li>
      </ul>
    </li>
    <li><a href="PH_v_employee.php"><i class="icon icon-home"></i> <span>View Employee</span></a> </li>
    <li><a href="PH_v_comment.php"><i class="icon icon-home"></i> <span>View Comment</span></a> </li>
    <li class="active"><a href="PH_v_nomination.php"><i class="icon icon-home"></i> <span>View Nomination</span></a> </li>
    <li><a href="PH_r_MCriminal.php"><i class="icon icon-home"></i> <span>Post Missing Criminal</span></a> </li>
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
  
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="DP_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="DP_v_nomination.php" class="current" >View Nomination</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
    <div class="row-fluid">
      <div class="span12" >
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Nomination</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Reporter Name</th>
                  <th>Nomination Type</th>
                  <th>Kebele</th>
                  <th>Place</th>
                  <th>Date</th>
                  <th>File</th>
                  <th>Description</th>
                  <th>RDatetime</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">

              <?php 

              $query = "SELECT * FROM nomination ORDER BY id ASC";
              $result = mysqli_query($db, $query);

              while($row = mysqli_fetch_array($result))
              {
              ?>
                  <td><?php $accu=$row['user_id'];
              $query = "SELECT fname,  mname FROM nomination inner join users on user_id=users.id where users.id='$accu'";
              $result1 = mysqli_query($db, $query);              if($row1 = mysqli_fetch_array($result1))
              {echo $row1['fname'] ." ". $row1['mname']; }?></td>
                  <td><?php echo $row['ntype'] ?></td>
                  <td><?php echo $row['kebele'] ?></td>
                  <td><?php echo $row['village'] ?></td>
                  <td><?php echo $row['ndatetime'] ?></td>
                  <td><a href="uploads/<?php echo $row['file'] ?>" target = "_blank" ><?php echo $row['file'] ?></a> </td>
                  <td><?php echo $row['description'] ?></td>
                  <td><?php echo $row['datetime'] ?></td>
                  
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
