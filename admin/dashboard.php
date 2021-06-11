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
	<section style="position:fixed; top:90px; left:0px;width:20%; height:100%; float:left; margin-top:10px;">
		<div style="background-color:#191919; color:white" >
			<center><h5>Current Orders</h5></center>
			
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
		<div >
			<a href="settings.php"><center><h5>Settings</h5></center></a>
		</div>
		<hr/>
	</section>
	<section style="width:80%; float:right; height:auto; background-color:#E9EBEE; padding-top:50px; ">
		<div class="container-fluid">
			<?php
			require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM orders where fullfill='0' ORDER BY order_id DESC";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
			?>
			<div class="row" style="background-color:white; margin:10px 100px;">
				
				<div class="col-sm-4">
					<p><?php echo $row["date"];?>, <?php echo $row['time'];?></p>
					<br/>
					<img src="<?php echo $row["item_img"];?>" style="width:150px; padding:10px 0px; height:150;"/>
				</div>
				<div class="col-sm-8">
					<h5><?php echo $row["item_name"];?></h5>
					<h6><b/>Person Name</b>: <?php echo $row["name"];?></h6>
					<h6><b/>Table no</b>: <?php echo $row["table_no"];?></h6>
					<h6><b>Quantity</b>: <?php echo $row["item_quantity"];?></h6>
					<h6><b>Payment method</b>: <?php echo $row["payment"];?></h6>
					<h6><b>Payment</b>: Unpaid</h6>
					<form method="post" action="delete_order.php">
					<input type="hidden" name="order_id" value="<?php echo $row["order_id"];?>"/>
					<button type="submit"class="btn" name="submit"  style="margin:0px 10px; float:left;">Discard</button>
					</form>
					<form method="post" action="fulfill_order.php">
					<input type="hidden" name="order_id" value="<?php echo $row["order_id"];?>"/>
					<button type="submit" name="submit" class="btn btn-primary" style="margin:0px 10px; float:left;">FulFill</button>
					</form>
				</div>
			</div>
			<?php
			}
		}
			catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
				}
				
			?>
			
			
		</div>
		</section>
		
		