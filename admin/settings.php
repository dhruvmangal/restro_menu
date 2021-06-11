<?php
	session_start();
	if(!isset($_SESSION["admin"]))
	{
		if(isset($_POST["admin_login"]))
		{
			$username= $_POST["username"];
			$password= $_POST["password"];
			if($username=="dhruv_mangal" and $password=="123456")
			{
				$_SESSION["admin"]= $username;
			}
		}
		else{
			header("Location:index.html");
			exit();
		}
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
</head>
<style>
h1,h2,h3,h4,h5,h6,p, button{
	font-family:sniglet;
}
body{
	background-color:#E9EBEE;
}
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

</style>
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
<body>
	<div id="popup"style="display:none;position:fixed; top:0px; left:0px;width:100%; height:100%; z-index:1; background-color:rgba(74, 77, 78, 0.6);">
		<div style="margin:50px;background-color:white; padding:20px;">
			<div style="float:right;margin-top:-50px; " onclick="close_popup()">
				<h1 style="color:gray;font-size:50px;">&times;</h1>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-8">
						<center><img src="img/bombayMasala.jpg" style="width:auto; height:400px;"/></center>
						
					</div>
					<div class="col-sm-4">
						<center><h2>Bombay Masala</h2></center>
						<form>
						<h4><b>Price: 200rs/</b></h4>
						
						<p style="color:black;"><b>Quantity</b></p>
						<input type="number" name="quantity"class="form-control" required/>
						<br/>
						<p>Have a Promocode?</p>
						
						<input type="text" name="promo" class="form-control"/>
						<h4>Total Price: </h4>
						<h2>200rs/</h2>
						<input type="submit" value="Add to Cart" name="submit" class="btn btn-primary"/>
						</form>
						
					</div>
				</div>
			</div>
			
			<center>
		</div>
		
	</div>
	<header style="position:fixed; top:0px; left:0px; width:100%; z-index:2;">
		<div class="container-fluid" style=" background-color:#191919;">
			<div class="row">
				<div class="col-sm-6">
				
					<img src="img/logo.png" style="margin:2px 60px; height:70px; width:auto;"/>
				</div>
				<div class="col-sm-2">
					
				</div>
				
				
			</div>
		</div>
	</header>
	<div style="padding-top:90px;">
	</div>
	<section style="position:fixed; top:70px; left:0px;width:20%; height:100%; float:left; margin-top:10px;background-color:white;">
		<div >
			<center><a href="dashboard.php"><h5>Current Orders</h5></a></center>
			
		</div>
		<hr/>
		<div>
			<center><a href="fullfilled.php"><h5>Fullfilled Orders</h5></a></center>
			
		</div>
		<hr/>
		<div >
			<center><a href="add_item.php"><h5>Add an Item</h5></a></center>
		</div>
		<hr/>
		<div >
			<center><a href="show_item.php"><h5>Show Item</h5></a></center>
		</div>
		<hr/>
		<div >
			<center><a href="offers.php"><h5>Offers</h5></a></center>
		</div>
		<hr/>
		<div >
			<a href="sliders.php"><center><h5>Sliders</h5></center></a>
		</div>
		<hr/>
		
		<div >
			<a href="payments.php"><center><h5>Payments</h5></center></a>
		</div>
		<hr/>
		<div style="background-color:#191919; color:white" >
			<a href="settings.php"><center><h5>Settings</h5></center></a>
		</div>
		<hr/>
	</section>
	<section style="width:80%; float:right; height:auto; background-color:#E9EBEE; padding-top:10px;">
		<div class="container-fluid"">
			<div class="row">
				<div class="col-md-12">
					<center><h4>Settings</h4></center>
				</div>
			</div>	
		</div>
		<div class="container-fluid" style="background-color:white;margin:60px;padding:10px 0px;">
			<div class="row">
				<div class="col-md-12">
					<button class="accordion">Food Categories</button>
					<div class="panel" style=" padding-bottom:5	px;">
						 
						<?php
							require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM category WHERE restro_id= '1' ORDER BY category_id DESC ";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
						?>
						<p><span style="float:left;"><?php echo $row["category_name"];?></span></p>
						<form action="delete_category.php" method="post">
							<input type="hidden" name="category_id" value="<?php echo $row["category_id"]?>"/>
							<?php
								if($row["category_id"]!='none')
								{
							?>
							<p><button type="submit" name="submit"class="btn btn-danger" style="float:right;font-size:28x;">&times; Delete</button></p><br/>
							<?php
								}
								else{?>
								<p><button type="button" disabled name="submit"class="btn btn-danger" style="float:right;font-size:28x;" >&times; Delete</button></p><br/>
								<?php
								}?>
						</form>	
							<?php
							}
		}
		catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
					}
							?>
							<form action="add_category.php" method="post">
						<h6 style="border-bottom:1px dashed gray">Add Category</h6>
						
							<div style="float:left;width:60%"><input type="text" name="category" class="form-control" placeholder="Enter Category"/></div>
							<div style="float:left;"><input type="submit" name="submit" class="btn btn-primary"/></div>
						</form>
						<br/>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="accordion">Payments</button>
					<div class="panel" style=" padding-bottom:5	px;">
						 
						<?php
							require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM payment";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
						?>
						<center><h5><?php echo $row["payment_name"];?></h5></center>
						<center><img src="<?php echo $row["payment_path"];?>" style="width:200px; height:auto;"/></center>
						
						<form method="post" action="delete_payment.php"> 	
						<input type="hidden" name="payment_id" value="<?php echo $row['payment_id']; ?>"/>
							<center><button type="submit" name="submit" style="font-size:18x;" class="btn btn-danger">&times; Delete</button></center><br/>
						</form>	
							<?php
							}
		}
		catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
					}
							?>
							<form action="add_payment.php" method="post" enctype="multipart/form-data">
						<h6 style="border-bottom:1px dashed gray">Add Payment</h6>
						
							<div style="float:left;width:30%">
								<p>Payment Method</p>
								<input type="text" name="payment" class="form-control" placeholder="Enter Payment Method Name"/></div>
							<div style="float:left;width:30%">
								<p>QR Code</p>
								<input type="file" name="fileToUpload" class="form-control"/></div>
							<div style="float:left; margin:30px 10px;"><input type="submit" name="submit" class="btn btn-primary"/></div>
						</form>
						<br/>
					</div>
				</div>
			</div>
		</div>
	</section>
		
		<footer>
		<div style="position:fixed; right:10px; bottom:10px;">
			<h2>Developed by <img src="img/pctech.png" style="width:50px; height:auto;"/></h2>
		</div>
	</footer>
	<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>