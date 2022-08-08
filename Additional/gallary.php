<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>gallary</title>
		<link href="../header.css" rel="stylesheet" type="text/css" />
  		<link href="../footer.css" rel="stylesheet" type="text/css" />
		<style>
	body{
		background-color:#EEEDE7;
		background-repeat:no-repeat;
		margin: 5px;
		margin-bottom:1px;
		text-align: left;
		width: 99%;
		border-style:solid;
		border-width:4px;
		border-color:#fff;
		border-radius: 10px;
	}
		img{
			width:100%;
			height:85%;
		}
		* {box-sizing: border-box;}
		body {font-family: Verdana, sans-serif;}
		.mySlides {display: none;}
		img {vertical-align: middle;}

		/* Slideshow container */
		.slideshow-container {
			max-width: 1000px;
			position: relative;
			margin: auto;
			margin-top:20px;
		}
		/* Number text (1/6 etc) */
		.numbertext {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
		}

		/* The dots/indicators */
		.dot {
			height: 15px;
			width: 15px;
			margin: 0 2px;
			background-color: rgb(49, 181, 221);
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
		}

		.active {
			background-color: #717171;
		}

		/* Fading animation */
		.fade {
			-webkit-animation-name: fade;
			-webkit-animation-duration: 1.5s;
			animation-name: fade;
			animation-duration: 1.5s;
		}

		@-webkit-keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
		}

		@keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
		}

		/* On smaller screens, decrease text size */
		@media only screen and (max-width: 300px) {
		.text {font-size: 11px}
		}
</style>
</head>
		<body>
		<div> <?php	include "header.php"; ?> <br><br><br><br>
		<?php include("timer.php");?>
		<script type="text/javascript">
			// Run function for every second of timer
			setInterval(rgbcolors, 300);
			function rgbcolors() {
				// rgb string generation
				var col = "rgb("
								+ Math.floor(Math.random() * 255) + ","
								+ Math.floor(Math.random() * 255) + ","
								+ Math.floor(Math.random() * 255) + ")";
				//change the text color with the new random color
				document.getElementById("divstyle").style.color = col;
			}
		</script>
	<div class="slideshow-container" style="font:bold 25px arial" align="center">
		<div class="mySlides fade">
		<div class="numbertext">1 / 12</div>
		<img src="../images/1.jpg" style="width:80%">
		</div>

		<div class="mySlides fade">
		<div class="numbertext">2 / 12</div>
		<img src="../images/2.jpg" style="width:80%">
		</div>

		<div class="mySlides fade">
		<div class="numbertext">3 / 12</div>
		<img src="../images/log.jpg" style="width:80%">
		</div>
		<div class="mySlides fade">
		<div class="numbertext">4 / 12</div>
		<img src="../images/logo.jpg" style="width:80%">
		</div>
		<div class="mySlides fade">
		<div class="numbertext">5 / 12</div>
		<img src="../images/1.jpg" style="width:80%">
		</div>
		<div class="mySlides fade">
		<div class="numbertext">6 / 12</div>
		<img src="../images/2.jpg" style="width:80%" alt="hey">
		</div>



		<div class="mySlides fade">
		<div class="numbertext">7 / 12</div>
		<img src="../images/log.jpg" style="width:80%">
		</div>

		<div class="mySlides fade">
		<div class="numbertext">8 / 12</div>
		<img src="../images/logo.jpg" style="width:80%">
		</div>

		<div class="mySlides fade">
		<div class="numbertext">9 / 12</div>
		<img src="../images/1.jpg" style="width:80%">
		</div>
		<div class="mySlides fade">
		<div class="numbertext">10 / 12</div>
		<img src="../images/2.jpg" style="width:80%">
		</div>
		<div class="mySlides fade">
		<div class="numbertext">11 / 12</div>
		<img src="../images/log.jpg" style="width:80%">
		</div>
		<div class="mySlides fade">
		<div class="numbertext">12 / 12</div>
		<img src="../images/logo.jpg" style="width:80%" alt="hey">
		</div>


	</div>
		<br>

		<div style="text-align:left">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 		
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		</div>

		<script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
		}
		slideIndex++;
		if (slideIndex > slides.length) {slideIndex = 1}    
		for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
		setTimeout(showSlides, 6000); // Change image every 3 seconds
		}
		</script><br><br><br><br>
		<?php	include("../footer.php");	?>
		</body>
		</html> 
