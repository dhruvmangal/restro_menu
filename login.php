<?php
session_start();
$_SESSION["cart"]= array();
?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/cs.css">
<script src="js/bootstrap.js" type="text/JavaScript"></script>
<script src="js/bootstrap.min.js" type="text/JavaScript"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet">

<style>
body{
	background-image: url("img/slide01.jpg");
}
h1,h2,h3,h4,h5,h6,p, button{
	font-family:sniglet;
}
</style>
</head>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
function close_popup(){
document.getElementById("popup").style.display= "none";
}
function open_popup(){
document.getElementById("popup").style.display= "block";
}
</script>
<body style="">

	<header>
		<div class="container-fluid" style=" background-color:#191919; width:100%; position:fixed; left:0px;">
			<div class="row">
				<div class="col-md-6">
				
					<img src="img/logo.png" style="margin:10px 100px; height:70px; width:auto;"/>
				</div>
				<div class="col-md-2">
					
				</div>
				
				
			</div>
		</div>
	</header>
	<section style="background-image:url('slide01.jpg'); padding-top:120px; height:100%;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4" style="background-color:white; padding:20px; border-radius:15px;">
					<div>
						<center><h4><b>Enter Your Details to login:</b></h4></center>
					</div>
					<form action="otp.php" method="post">
					<div>
						<p style="color:black;">Your Name:</p>
						<input type="text" name="name" class="form-control" required />
					</div>
					<div>
						<p style="color:black;">Your Phone No:</p>
						<input type="number" name="phone" class="form-control" maxlength='10' required />
					</div>
					<br/>
					<div>
						<p style="color:black;">Your Table No:</p>
						<input type="number" name="table" class="form-control" maxlength='2	' required />
					</div>
					<br/>
					<div>
						<input type="submit" name="submit" class="form-control btn btn-primary" style="background-color:rgb(22,29,39);"/>
					</div>
					</form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</section>