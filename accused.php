<?php  
    session_start();
    if(isset($_SESSION['uname'])){
      //
    }else{
      header("location: login.php");
    }

  ?>

<?php include('Connection.php');?>

<?php

if (isset($_POST['region_id'])){
  $qry = "SELECT * from region where id=".mysqli_real_escape_string($db,$_POST['region_id'])." order by zone";
  $res = mysqli_query($db, $qry);
  if(mysqli_num_rows($res) > 0){
    echo '<option value="">Select</option>';
    while($row = mysqli_fetch_object($res)){
      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
    }
  }
  else{
    echo '<option value="">No Record</option>';
  }
}
else if(isset($_POST['zone_id'])){
  $qry = "SELECT * from zone where id=".mysqli_real_escape_string($db,$_POST['zone_id'])." order by woreda";
  $res = mysqli_query($db, $qry);
  if(mysqli_num_rows($res) > 0){
    echo '<option value="">Select</option>';
    while($row = mysqli_fetch_object($res)){
      echo '<option value="'.$row->state_id.'">'.$row->state.'</option>';
    }
  }
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

<script type="text/javascript">
    $(document).ready(function(){
      $(document).on('change','#region', function(){
        var region_id = $(this).val();
        if(region_id != ""){
          $.ajax({
            url:"get_data.php",
            type:'POST',
            data:{region_id:id},
            success:function(response){
              if(response != ''){
                $("#zone").removeAttr('disabled','disabled').html(response);
                $("#woreda, #kebele").attr('disabled','disabled').html("<option value=''> Select</option>" );
              }
              else{
                $("#zone, #woreda, #kebele").attr('disabled','disabled').html("<option value=''>Select </option>");
              }
            }
          });
        }else{
          $("#zone, #woreda, #kebele").attr('disabled','disabled').html("<option value=''>Select </option>");
        }

      });

    $(document).on('change','#zone', function(){
      var zone_id = $(this).val();
      if(zone_id != ""){
        $.ajax({
        url:"DP_r_accused.php",
        type:'POST',
        data:{zone_id:id},
        success:function(response) {
          if(response != ''){
            $("#woreda").removeAttr('disabled','disabled').html(response);
            $("#kebele").attr('disabled','disabled').html("<option value=''>Select </option>");
            
          }
          else $("#woreda, #kebele").attr('disabled','disabled').html("<option value=''>Select</option>");
        }

      });
        
    }
    else{
          $("#woreda, #kebele").attr('disabled','disabled').html("<option value=''>Select</option>");
      }
    });

    $(document).on('change','#woreda', function(){
      var woreda_id = $(this).val();
      if(woreda_id != ""){
        $.ajax({
        url:"DP_r_accused.php",
        type:'POST',
        data:{woreda_id:id},
        success:function(response) {
          if(response != '') $("#city").removeAttr('disabled','disabled').html(response);
          else $("#kebele").attr('disabled','disabled').html("<option value=''>Select</option>");
        }

      });
        
    }
    else{
          $("#kebele").attr('disabled','disabled').html("<option value=''>Select</option>");
      }
    });
  });


</script>
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
    <li><a href="DP_v_history.php"><i class="icon icon-heart"></i> <span>View Placement History</span></a></li>
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
    <li class="active" class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user-md"></i> <span>Accused<b class="caret"></b></span> </a>
      <ul>
        <li class="active"><a href="DP_r_accused.php"><i class="icon-plus"></i>Register Accused</a></li>
        <li><a href="DP_v_accused.php"><i class="icon-eye-open"></i>View Accused</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-user-md"></i> <span>Witness<b class="caret"></b></span></a>
      <ul>
        <li><a href="DP_r_witness.php"><i class="icon-plus"></i>Register Witness</a></li>
        <li><a href="DP_v_witness.php"><i class="icon-eye-open"></i>View Witness</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-question-sign"></i> <span>Nomination<b class="caret"></b></span></a>
      <ul>
        <li><a href="DP_r_nomination.php"><i class="icon-plus"></i>Register Nomination</a></li>
        <li><a href="DP_v_nomination.php"><i class="icon-eye-open"></i>View Nomination</a></li>
      </ul>
    </li>

    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-file"></i> <span>Crime</span><b class="caret"></b></span></a>
    <ul>
        <li><a href="DP_r_crime.php"><i class="icon-plus"></i>Register Crime</a></li>
        <li><a href="DP_v_crime.php"><i class="icon-eye-open"></i>View Crime</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-question-sign"></i> <span>Question<b class="caret"></b></span></a>
      <ul>
        <li><a href="DP_question.php"><i class="icon-plus"></i>Ansewr Question</a></li>
        <li><a href="DP_v_question.php"><i class="icon-eye-open"></i>View Question</a></li>
      </ul>
    </li>
    <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon icon-pencil"></i> <span>Post</span><b class="caret"></b></span></a>
    <ul>
        <li><a href="DP_new.php"><i class="icon-plus"></i>Post News</a></li>
        <li><a href="DP_v_new.php"><i class="icon-eye-open"></i>View News</a></li>
        <li><a href="DP_notice.php"><i class="icon-plus"></i>Post Notice</a></li>
        <li><a href="DP_v_notice.php"><i class="icon-eye-open"></i>View Notice</a></li>
      </ul>
    </li>
    <li><a href="DP_v_comment.php"><i class="icon icon-comments"></i> <span>View Comment</span></a></li>
    <li><a href="DP_phone.php"><i class="icon icon-phone-sign"></i> <span>Phone Number</span></a></li>
    <li><a href="DP_profile.php"><i class="icon icon-user"></i> <span>Profile</span></a></li>
    <li><a href="DP_about.php"><i class="icon icon-info-sign"></i> <span>About</span></a></li>

  
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="DP_index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="DP_r_accused.php" class="current" >Register Accused</a>
    </div>
  </div>
<!--End-breadcrumbs-->
  <div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Register Accused</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="fname" placeholder="First name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Middle Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="mname" placeholder="Middle name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="lname" placeholder="Last name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Gender</label>
              <div class="controls">
                <input type="radio" name="gender" value="male"> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
                <input type="radio" name="gender" value="other"> Other
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Age :</label>
              <div class="controls">
                <input type="Number" class="span11" name="age" placeholder="Age" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile :</label>
              <div class="controls">
                <input type="text" class="span11" name="mobile" placeholder="Mobile" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nationality :</label>
              <div class="controls">
                <input type="text" class="span11" name="nationality" placeholder="Nationality" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Region :</label>
              <div class="controls">
                <select name="region" id="region " class="span11">
                  <option>Select region</option>
                  <?php 
                    $query = "SELECT * FROM region";
                    $result = mysqli_query($db, $query);
                     if(mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_array($result)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['name']; ?></option>
                      <?php
                    }
                  }
                  ?>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Zone :</label>
              <div class="controls">
                <select name="zone" id="zone " class="span11" disabled="disabled">
                  <option>Select zone</option>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Wereda :</label>
              <div class="controls">
                <select name="woreda" id="woreda " class="span11" disabled="disabled">
                  <option>Select woreda</option>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kebele :</label>
              <div class="controls">
                <select name="Kebele" id="Kebele " class="span11" disabled="disabled">
                  <option>Select kebele</option>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Educational Level :</label>
              <div class="controls">
                <input type="text" class="span11" name="elevel" placeholder="Educational level" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Marginal Status :</label>
              <div class="controls">
                <input type="text" class="span11" name="mstatus" placeholder="Marginal status " />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Religion :</label>
              <div class="controls">
                <input type="text" class="span11" name="religion" placeholder="Religion" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Job :</label>
              <div class="controls">
                <input type="text" class="span11" name="job" placeholder="Job" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Crime :</label>
              <div class="controls">
                <input type="text" class="span11" name="crime" placeholder="Crime" />
              </div>
            </div>
                       
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">
                <textarea class="span11" name="description pla
                " placeholder="Description"></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Registerd</h5>
        </div>
        <div class="widget-content nopadding">
         <h5>
           Display registerd accused!
         </h5>
        </div>
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
