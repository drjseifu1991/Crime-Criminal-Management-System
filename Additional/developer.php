
	<!DOCTYPE html>
	<html>
	<head><title>Developers</title>
  <link href="developer.css" rel="stylesheet" type="text/css" />
  <link href="../header.css" rel="stylesheet" type="text/css" />
  <link href="../footer.css" rel="stylesheet" type="text/css" />
<style>
body{
  background-color:#EEEDE7;
  background-repeat:no-repeat;
	margin: 5px;
  margin-bottom:1px;
	text-align: left;
	width: 1336px;
	border-style:solid;
	border-width:4px;
	border-color:#fff;
	border-radius: 10px;
  } 
h1{
  color:#CC33AA;
	font-size:20px;
	margin: 20px 0px 20px 0px;
    }
	h2{
  color:#1705fe#CC33AA;
	font-size:14px;
	margin: 20px 0px 20px 0px;
    }
	</style>

	</head>
	<body id="contianer">
    <div id="bod">
      <div id="bg">
        <div> <?php	include "header.php"; ?> </div>                    
        <div id="left"><?php include "timer.php"; ?> </div>
        <div id ="middle" style="height:712px;width:820px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
            <h1 style="font-family:rockwell;color:black;font-size:20px;" align="center">
              DEVELOPERS: <br>BAHIR DAR UNIVERSITY</h1>
            <h1 style="font-family:rockwell;color:GREEN;font-size:20px;" align="center">
              COMPUTER ENGINEERING  STUDENTS IN 2014 E.C </h1>
          <fieldset>
              <table border="0" width="100%" height="50%">
                <tr>
                    <td>
                      <?php $i=60; while($i > 0){ '&nbsp'; $i--; }?>
                        <center><img src="../images/1.jpg" width="200px" height="240px"></center>
                    </td>
                </tr>
                <tr>
                  <td>
                      <h6 style="font-family:Nyala;color:#004B49;font-size:20px;"align="left"> 
                      <?php $i=33; while($i > 0): ?>
                         &nbsp; <?php $i--; ?>
                         <?php endwhile; ?>
                         Name:Abebaw Abitie<br> 
                      <?php $i=33; while($i > 0): ?>
                         &nbsp; <?php $i--; ?>
                         <?php endwhile; ?> 
                         Email:Abebaw@gmail.com <br>
                      <?php $i=33; while($i > 0): ?>
                         &nbsp; <?php $i--; ?>
                         <?php endwhile; ?> 						
                         Phone:+251943543454<br>
                      <?php $i=33; while($i > 0): ?>
                         &nbsp; <?php $i--; ?>
                         <?php endwhile; ?>
                         ID:1010896 <br>
                      <?php $i=33; while($i > 0): ?>
                         &nbsp; <?php $i--; ?>
                         <?php endwhile; ?>
                         Work:Student<br>
                      <?php $i=33; while($i > 0): ?>
                         &nbsp; <?php $i--; ?>
                         <?php endwhile; ?>                                      
                  </td>
                </tr>
              </table>
              <table border="0" width="100%" height="50%">
                <tr>
                  <td><img src="../images/2.jpg" width="200px" height="240px"> </td>
                  <td><img src="../images/log.jpg" width="200px" height="240px"></td>
                </tr>
                <tr>
                  <td>
                      <h6 style="font-family:rockwell;margin-left: 10px;color:#004B49;font-size:16px;" align="left">				
                      Name:Aysheshm Kasahun<br>
                      Email:Aysheshm@gmail.com<br>
                      ID:1010... <br>
                      phone:+251976767698<br>
                      Work:Student</h6>
                  </td>
                  <td>
                    <h6 style="font-family:rockwell;color:#004B49;font-size:16px;" align="left">
                    Name:Asmamaw Aynalem <br>			
                    Email:Asmamaw@gmail.com<br>
                    phone:+2519098989887<br>
                    ID:1010... <br>
                    Work:Student</h6>
                  </td>  
                </tr>
              <tr>
                  <td><img src="../images/logo.jpg" width="200px" height="240px"></td>
                </tr>
                <tr>
                  <td>
                      <h6 style="font-family:rockwell;margin-left: 10px;color:#004B49;font-size:16px;" align="left">        
                      Name:Daniel Lewtie<br>
                      Email:Daniel@gmail.com<br>
                      ID:1010... <br>
                      phone:+251976767698<br>
                      Work:Student</h6>
                  </td>
                </tr>
              </table>
          </fieldset>
        </div>	
      </div>
    </div>
<?php	include("../footer.php");	?>
</body>
</html>

