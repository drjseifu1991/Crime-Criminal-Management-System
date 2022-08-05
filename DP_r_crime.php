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
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-map-marker"></i> <span>Assign<b class="caret"></b></span></a> 
      <ul>
        <li><a href="DP_assign.php"><i class="icon-plus"></i>Assign Police</a></li>
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
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-comments"></i> <span>Nomination<b class="caret"></b></span></a>
      <ul>
        <li><a href="DP_r_nomination.php"><i class="icon-plus"></i>Register Nomination</a></li>
        <li><a href="DP_v_nomination.php"><i class="icon-eye-open"></i>View Nomination</a></li>
      </ul>
    </li>

    <li class="active"class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-file"></i> <span>Crime</span><b class="caret"></b></span></a>
    <ul>
        <li class="active"><a href="DP_r_crime.php"><i class="icon-plus"></i>Register Crime</a></li>
        <li><a href="DP_v_crime.php"><i class="icon-eye-open"></i>View Crime</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-pencil"></i> <span>Post</span><b class="caret"></b></span></a>
    <ul>
        <li><a href="DP_notice.php"><i class="icon-plus"></i>Post Notice</a></li>
        <li><a href="DP_v_notice.php"><i class="icon-eye-open"></i>View Notice</a></li>
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
    <div id="breadcrumb"> <a href="DP_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="DP_r_crime.php" class="current" >Register Crime</a></div>
  </div>
<!--End-breadcrumbs-->
<div class="container-fluid">
  <hr>
  <?php 
$accuser = $accused = $witness1 = $witness2 = $witness3= $controler = $ctype = $clevel = $files =$description = "";
$accused_id_err = $rdatetime_err = $accuser_id_err = $witness_id_err = $witness_id2_err = $witness_id3_err = $ctype_err = $clevel_err = $user_id_err = "";

if (isset($_POST['save'])){
        $accuser = mysqli_real_escape_string($db, $_POST['accuser']);
        $accused = mysqli_real_escape_string($db, $_POST['accused']);
        $witness1 = mysqli_real_escape_string($db, $_POST['witness1']);
        $witness2 = mysqli_real_escape_string($db, $_POST['witness2']);
        $witness3 = mysqli_real_escape_string($db, $_POST['witness3']);
        $controler = mysqli_real_escape_string($db, $_POST['controler']);
        $ctype = mysqli_real_escape_string($db, $_POST['ctype']);
        $clevel = mysqli_real_escape_string($db, $_POST['clevel']);
        $rdatetime = mysqli_real_escape_string($db, $_POST['rdatetime']);
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

        if(empty($_POST['accuser'])){
          $accuser_id_err = "Select accuser!";
        }

        if(empty($_POST['accused'])){
          $accused_id_err = "Select accused!";
        }

        if(empty($_POST['witness1'])){
          $witness_id_err = "Select Witness 1.";
        }
        if(empty($_POST['witness2'])){
          $witness_id2_err = "Select Witness 2.";
        }
        if(empty($_POST['witness3'])){
          $witness_id3_err = "Select Witness 3.";
        }
        if(empty($_POST['controler'])){
          $user_id_err = "Select Controler!";
        }

        if (empty($_POST['ctype'])) {
          $ctype_err = "Enter crime type!";
        }

        if(empty($_POST['clevel'])){
          $clevel_err = "Enter crime level!";
        }
        if(empty($_POST['rdatetime'])){
          $ndatetime_err = "Occurance date and time must be fill.";
        }

        else{
          $query = "INSERT INTO crime (accuser_id, accused_id, witness_1, controller, ctype, clevel, rdatetime, file, description, witness_2, witness_3) VALUES ('$accuser', '$accused', '$witness1', '$controler', '$ctype', '$clevel', '$rdatetime', '$file', '$description', '$witness2', '$witness3')";
          mysqli_query($db, $query);
           echo "<h3>Registration Success!</h3> ";
        }
}

?>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register Crime</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="DP_r_crime.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Accuser :</label>
              <div class="controls">
                <select name="accuser" id="accuser " class="span11">
                  <option value="" disabled selected>Select Accuser</option>
                  <?php 
                    $query = "SELECT * FROM accuser";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['fname'] . " ". $row['mname']. " ". $row['lname']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $accuser_id_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Accused :</label>
              <div class="controls">
                <select name="accused" id="accused " class="span11">
                  <option value="" disabled selected>Select Accused</option>
                  <?php 
                    $query = "SELECT * FROM accused";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['fname'] . " ". $row['mname']. " ". $row['lname']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $accused_id_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Witness 1 :</label>
              <div class="controls">
                <select name="witness1" id="witness1 " class="span11">
                  <option value="" disabled selected>Select Wittness 1</option>
                  <?php 
                    $query = "SELECT * FROM witness";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['fname'] . " ". $row['mname']. " ". $row['lname']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $witness_id_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Witness 2 :</label>
              <div class="controls">
                <select name="witness2" id="witness2 " class="span11">
                  <option value="" disabled selected>Select Wittness 2</option>
                  <?php 
                    $query = "SELECT * FROM witness";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['fname'] . " ". $row['mname']. " ". $row['lname']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $witness_id2_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Witness 3 :</label>
              <div class="controls">
                <select name="witness3" id="witness3 " class="span11">
                  <option value="" disabled selected>Select Wittness 3</option>
                  <?php 
                    $query = "SELECT * FROM witness";
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['fname'] . " ". $row['mname']. " ". $row['lname']; ?></option>
                      <?php
                    }
                  ?>
                  
                </select>
                <br>
                 <span class="error"><?php echo $witness_id3_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Controler :</label>
               <div class="controls">
                <select name="controler" id="controler " class="span11">
                  <option value="" disabled selected>Select Controler</option>
                  <?php 
                    $query = "SELECT users.id,fname,mname,lname FROM users inner join auth_role on users.id=user_id where role_id=1 or role_id=3";
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
            <div class="control-group">
              <label class="control-label">Crime Type :</label>
              <div class="controls">
                <input type="text" class="span11" name="ctype" placeholder="Crime type" />
                <br>
                <span class="error"><?php echo $ctype_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Crime Level :</label>
              <div class="controls">
                <input type="text" class="span11" name="clevel" placeholder="Crime level" />
                <br>
                <span class="error"><?php echo $clevel_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Occurance Date :</label>
              <div class="controls">
                <input type="date" class="span11" name="rdatetime" placeholder="Date and time" />
                <br>
                 <span class="error"><?php echo $rdatetime_err; ?></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Attach File</label>
              <div class="controls">
                <input type="file" name="files" />
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea class="span11" name="description" placeholder="Description"></textarea>
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
