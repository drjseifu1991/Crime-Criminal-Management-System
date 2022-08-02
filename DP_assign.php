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
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="DP_index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
  <li><a href="DP_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Assign<b class="caret"></b></span></a> 
      <ul>
        <li class="active"><a href="DP_assign.php"><i class="icon-plus"></i>Assign Police</a></li>
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
    <div id="breadcrumb"> <a href="DP_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="DP_assign.php" class="current" >Assign Police</a>
    </div>
  </div>


<!--End-breadcrumbs-->
  <div class="container-fluid">
  <hr>
  <?php
    $user_id = $place = $stime = $ftime ="";
    $user_id_err = $place_id_err = $stime_err = $ftime_err = "";

    if(isset($_POST['assign'])){

        $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
        $place = mysqli_real_escape_string($db, $_POST['place']);
        $stime = mysqli_real_escape_string($db, $_POST['stime']);
        $ftime = mysqli_real_escape_string($db, $_POST['ftime']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $session=$_SESSION['user_id'];

        //validation

        if(empty($_POST['user_id'])){
          $user_id_err = "First select police!";
        }

        if(empty($_POST['place'])){
          $place_id_err = "First select place!";
        }

        if(empty($_POST['stime'])){

          $stime_err = "Enter starting date and time!";

        }

        if(empty($_POST['ftime'])){
          $ftime_err = "Enter finishing date and time!";
        }

        else{
          $query = "INSERT INTO user_place (user_id, place_id, stime, ftime, description) VALUES('$user_id', '$place', '$stime', '$ftime', '$description')"; 
           $query_result = mysqli_query($db, $query);
           if($query_result) {
            echo "<h3>Assining Success!</h3> ";
        }
        else {
          echo "<h3>Assining Not Success!</h3> ";
        }
        }
           }
 ?>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Assign Police</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="DP_assign.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Police :</label>
              <div class="controls">
                <select name="user_id" id="user_id " class="span11">
                  <option value="" disabled selected>--Select Police--</option>
                  <?php 
                    $query = "SELECT users.id,fname,mname,lname FROM users inner join auth_role on users.id=user_id where role_id=3 order by fname";
                   $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['fname'] . " ". $row['mname']. " ". $row['lname']. "(".$row['id'].")"; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $user_id_err; ?></span>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Place :</label>
              <div class="controls">
              <select name="place" id="place_id " class="span11">
                  <option value="" disabled selected>--Select Place--</option>
                  <?php 
                    $query = "SELECT id,kebele,place FROM placement";
                   $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['kebele'] . " ". $row['place']. " ". "(".$row['id'].")"; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <span class="error"><?php echo $place_id_err; ?></span>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Starting date :</label>
              <div class="controls">
                <input type="date" class="span11" name="stime" placeholder="Starting date" />
                <br>
                <span class="error"><?php echo $stime_err; ?></span>
              </div>
            </div>
            <div class="control-group ">
              <label class="control-label">Finishing date :</label>
              <div class="controls">
                <input type="date" class="span11" name="ftime" placeholder="Finishing date" />
                <br>
                <span class="error"><?php echo $ftime_err; ?></span>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea class="span11" name="description" placeholder="Description"></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="assign" id="assign" class="btn btn-success">Assign</button>
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