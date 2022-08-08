<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page...</title>
    <link rel="stylesheet" href="css/home/index.css" media="all">
    <link rel="stylesheet" href="header.css" media="all">
    <link href="footer.css" rel="stylesheet" type="text/css" />
    <style>
body{
    background-color:#EEEDE7;
    background-repeat:no-repeat;
	margin: 5px;
    margin-bottom:1px;
	text-align: left;
	width: 100%;
	border-style:solid;
	border-width:4px;
	border-color:#fff;
	border-radius: 10px;
  }
  .btn1 a{
      text-decoration: none;
      padding: 20px;
      color: black;
      font-size:99%;
  }
  #img{
      width:100%;
  }
  #descreption{
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    margin: auto;
    background-color:#f0f0f0;
  }
    #image{
        margin:-300px -30px  0px 420px ;
      }
      #image img{
          width:96%;
          height: 17%;
      }
      img{
          width:99%;
          height:17%;
      }
    </style>
</head>
<body>
 <?php include("index_header.php"); ?>
<div class="options">
    <ul>
    <li><button><a  href="Additional/gallary.php">Photos</a></button></li> 
    <li><button><a  href="Additional/mission.php">Mission</a></button></li>  
    <li><button><a  href="Additional/vission.php">Vission</a></button></li> 
    <li><button><a href="Additional/developer.php">Developers</a></button></li>  
    </ul>
</div>
    <div id="image" >
     <img src="images/welcome.gif" alt="images/welcome2.gif">
    </div><br><br><br><br><br>
    <div id="descreption">
        <p align="center"><font size="5" color="blue" style="margin-left:4px; margin-right:4px;">
        <strong>WELCOME TO BAHIR DAR POLICE CRIME MANAGEMENT SYSTEM</strong>
        </font><br>
    </div>
   <?php	include("footer.php");	?>
</body>
</html>