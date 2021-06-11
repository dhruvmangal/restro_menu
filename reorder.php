<?php
session_start();
if(!isset($_SESSION["phone"]) and !isset($_SESSION["name"]))
{
	header("Location:login.php");
	
}
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
<link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet">
<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
h1,h2,h3,h4,h5,h6,p, button{
	font-family:sniglet;
}
</style>
</head>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
<?php
if(isset($_SESSION["open_cart"]))
{
?>
$(document).ready(function(){
    open_sidenav();
});
<?php
}
?>
function close_popup(){
document.getElementById("popup").style.display= "none";
}
function open_popup(){
document.getElementById("popup").style.display= "block";
}
function close_sidenav(){
document.getElementById("cart").style.display= "none";
}
function open_sidenav(){
document.getElementById("cart").style.display= "block";
}


</script>
<body style="background-color:#E9EBEE;">
<header style="width:100%; position:fixed; left:0px; z-index:1;">
		<div class="container-fluid" style=" background-color:#191919;">
			<div class="row">
				<div class="col-sm-6 col-xs-4">
				
					<img src="img/logo.png" style="margin:10px 10px; height:50px; width:auto;"/>
				</div>
				<div class="col-sm-2 col-xs-0">
					
				</div>
				
				<div class="col-sm-2 col-xs-8">
					<center><h4 style="color:white;padding-top:15px;"><i class="fa fa-user"></i> Welcome, <?php echo $_SESSION["name"];?></h4></center>
				</div>
			</div>
		</div>
	</header>
	<section style="width:100%; padding-top:90px;">
	</section>
	<section style="margin:10px; background-color:white; padding:20px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<center><h3 style="color:green;"><i class="fa fa-check-circle"></i> Your Order has been placed.</h3></center>
				</div>
				
			</div>
			<div class="row" style="margin-top:80px;">
				<div class="col-sm-6 col-xs-6">
					<center><a href="index.php"><button class="btn btn-primary" style="font-size:20px; width:140px;">
						Order again
					</button></a></center>
				</div>
				<div class="col-sm-6 col-xs-6">
					<center><a href="exit.php"><button class="btn btn btn-primary" style="font-size:20px; width:140px;">
						Exit
					</button></a></center>
				</div>
			</div>
		</div>
	</section>