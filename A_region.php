<?php  include 'Connection.php'; ?>

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
</style>
</head>
<body>

<!--Header-part-->
<div id="header">
  <img src="img/logo.JPG">
</div>
<!--close-Header-part--> 

        <?php 
        $name = $description = $name_err = $message = "";
       //$description_err = "";
            if (isset($_POST['register'])){


                $name = mysqli_real_escape_string($db, $_POST['name']);
                $description = mysqli_real_escape_string($db, $_POST['description']);

                if(empty($_POST['name'])){
                  $name_err = "Enter region name or number!";
                }
                else if (ctype_alpha(str_replace(' ', '', $_POST['name'])) === false) {
                   $name_err = "Letters and white space only!";
                 }
                else{
                  $query = "INSERT INTO region (name, description) VALUES ('$name', '$description')";
                        mysqli_query($db, $query);

                        $message = "Region register successfully!";
                }

}
                
        ?>
<!--top-Header-menu-->
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="Admin.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li><a href="Admin.php"><i class="icon icon-home"></i> <span>Register Employee</span></a> </li>
    <li><a href="A_r_assign.php"><i class="icon icon-map-marker"></i> <span>Assign Role</span></a></li>
    <li  class="active"><a href="A_region.php"><i class="icon icon-edit"></i> <span>Register Region</span></a> </li>
    <li><a href="A_zone.php"><i class="icon icon-edit"></i> <span>Register Zone</span></a> </li>
    <li><a href="A_woreda.php"><i class="icon icon-map-marker"></i> <span>Register Woreda</span></a></li>
    <li><a href="A_kebele.php"><i class="icon icon-edit"></i> <span>Register Kebele</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->

<!--End-breadcrumbs-->
  <div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <h4>
        <?php echo $message; ?>
      </h4>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
          <h5>Region</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="A_region.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Region Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Region name" />
                <span class="error">
                  <?php echo $name_err; ?>
                </span>
                
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Description :</label>
              <div class="controls">
                <textarea style="font-style: italic;" class="span11" name="description" placeholder="Optional"></textarea>
                <!-- <span class="error"><?php //echo $description_err; ?></span> -->
                
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="register" id="register" class="btn btn-success">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<!--End-breadcrumbs-->

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
