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
    <li class="active"><a href="C_index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="C_v_MCriminal.php"><i class="icon icon-eye-open"></i> <span>View Missing Criminal</span></a></li>
    <li><a href="C_r_nomination.php"><i class="icon icon-plus"></i><span>Give Nomination</span></a></li>
    <li><a href="C_r_comment.php"><i class="icon icon-refresh"></i> <span>Give Comment</span></a></li>
    <li><a href="C_r_complain.php"><i class="icon icon-phone-sign"></i> <span>Send Complain</span></a></li>
    <li><a href="C_r_accusation.php"><i class="icon icon-phone-sign"></i> <span>Send Accusation</span></a></li>
  
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
  <div class="dashb">
    <div class="card text-white bg-primary mr-3 mb-3" style="width: 14rem;">
        <div class="card-body">
            <h5 class="card-title">Total Detective Police</h5>
            <p class="card-text"style="font-size:1.5rem; font-weight: bold;"> 
            <?php
            $queryc = "SELECT * FROM auth_role WHERE role_id=1";
            if($resultc = mysqli_query($db, $queryc)) {
                $rowc = mysqli_num_rows($resultc);
                echo $rowc;
            }
            else {
                echo 0;
            }
            
            ?>
            </p>
        </div>
    </div>
    <div class="card text-white bg-secondary mr-3 mb-3" style="width: 14rem;">
      <div class="card-body">
        <h5 class="card-title">Preventive Police</h5>
        <p class="card-text"style="font-size:1.5rem; font-weight: bold;"> 
        <?php
          $queryc = "SELECT * FROM auth_role WHERE role_id=3";
          if($resultc = mysqli_query($db, $queryc)) {
            $rowc = mysqli_num_rows($resultc);
            echo $rowc;
          }
          else {
            echo 0;
          }
          
        ?>
        </p>
      </div>
    </div>
    <div class="card text-white bg-success mr-3 mb-3" style="width: 14rem;">
      <div class="card-body">
        <h5 class="card-title">Traffic Police Officer</h5>
        <p class="card-text"style="font-size:1.5rem; font-weight: bold;"> 
        <?php
          $queryc = "SELECT * FROM auth_role WHERE role_id=2";
          if($resultc = mysqli_query($db, $queryc)) {
            $rowc = mysqli_num_rows($resultc);
            echo $rowc;
          }
          else {
            echo 0;
          }
          
        ?>
        </p>
      </div>
    </div>
    <div class="card text-white bg-danger mr-3 mb-3" style="width: 14rem;">
      <div class="card-body">
        <h5 class="card-title">Traffic Police</h5>
        <p class="card-text"style="font-size:1.5rem; font-weight: bold;"> 
        <?php
          $queryc = "SELECT * FROM auth_role WHERE role_id=4";
          if($resultc = mysqli_query($db, $queryc)) {
            $rowc = mysqli_num_rows($resultc);
            echo $rowc;
          }
          else {
            echo 0;
          }
          
        ?>
        </p>
      </div>
    </div>
    <div class="card text-white bg-primary mr-3 mb-3" style="width: 14rem;">
        <div class="card-body">
            <h5 class="card-title">Total Head Police</h5>
            <p class="card-text"style="font-size:1.5rem; font-weight: bold;"> 
            <?php
            $queryc = "SELECT * FROM auth_role WHERE role_id=6";
            if($resultc = mysqli_query($db, $queryc)) {
                $rowc = mysqli_num_rows($resultc);
                echo $rowc;
            }
            else {
                echo 0;
            }
            
            ?>
            </p>
        </div>
    </div>
    <div class="card text-white bg-success mr-3 mb-3" style="width: 14rem;">
      <div class="card-body">
        <h5 class="card-title">Traffic Human Resource</h5>
        <p class="card-text"style="font-size:1.5rem; font-weight: bold;"> 
        <?php
          $queryc = "SELECT * FROM auth_role WHERE role_id=8";
          if($resultc = mysqli_query($db, $queryc)) {
            $rowc = mysqli_num_rows($resultc);
            echo $rowc;
          }
          else {
            echo 0;
          }
          
        ?>
        </p>
      </div>
    </div>
  </div>
    <div class="row-fluid">
      <div class="span12" >
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Missing Criminal</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>City</th>
                  <th>Kebele</th>
                  <th>Date</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">

              <?php 

              $query = "SELECT * FROM missing_criminal ORDER BY id ASC";
              $result = mysqli_query($db, $query);

              while($row = mysqli_fetch_array($result))
              {
              ?>
              <td><?php echo $row['fname']?></td>
              <td><a href="uploads/<?php echo $row['photo'] ?>" target = "_blank" ><?php echo $row['photo'] ?></a> </td>
              <td><?php echo $row['city'] ?></td>
              <td><?php echo $row['kebele'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $row['description'] ?></td>
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
