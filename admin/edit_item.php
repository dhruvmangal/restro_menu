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
<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />
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
	<header style="position:fixed; top:0px; left:0px; width:100%;">
		<div class="container-fluid" style=" background-color:#191919;">
			<div class="row">
				<div class="col-sm-6">
				
					<img src="img/logo.png" style="margin:10px 100px; height:70px; width:auto;"/>
				</div>
				<div class="col-sm-2">
					
				</div>
				
				
			</div>
		</div>
	</header>
	<div style="padding-top:90px;">
	</div>
	<section style="width:20%; height:100%; float:left; margin-top:10px;">
		<div>
			<center><a href="dashboard.php"><h4>Current Orders</h4></a></center>
			
		</div>
		<hr/>
		<div >
			<center><a href="fullfilled.php"><h4>Fullfilled Orders</h4></a></center>
			
		</div>
		<hr/>
		<div>
			<center><a href="add_item.php"><h4>Add an Item</h4></a></center>
		</div>
		<hr/>
		<div  style="background-color:#191919; color:white" >
			<center><a href="show_item.php"><h4>Show Item</h4></a></center>
		</div>
		<hr/>
		<div >
			<center><a href="offers.php"><h4>Offers</h4></a></center>
		</div>
		<hr/>
		<div >
			<a href="sliders.php"><center><h4>Sliders</h4></center></a>
		</div>
		<hr/>
		<div >
			<center><h4>Payments</h4></center>
		</div>
		<hr/>
	</section>
	<?php
	if(isset($_POST["edit"]))
	{
		$item_id= $_POST["item_id"];
		require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM item where item_id= ".$item_id." ";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
		
	?>
	<section style="width:80%; height:100%; float:left; background-color:#E9EBEE; padding-top:50px; ">
		<div class="container-fluid">
			<form action="edit_item_to_db.php" method="post"  enctype="multipart/form-data">
			<div class="row" style="margin:30px 50px; background-color:white; padding:10px;">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<center><h3>Edit Item</h3></center>
					<input type="hidden" name="item_id" value="<?php echo $row["item_id"];?>"/>
					<p>Item Name</p>
					<input type="text" name="item_name" class="form-control" value="<?php echo $row["item_name"];?>"/>
					<br/>
					<p>Item Image</p>
					<img src="<?php echo $row["item_img"];?>" style="width:100px; height:auto;"/>	
					<input type="file" name="fileToUpload" class="form-control" value="<?php echo $row["item_img"];?>"/>
					<br/>
					<p>Item Price</p>
					<input type="number" name="item_price" class="form-control" placeholder="In Rupees" value="<?php echo $row["item_price"];?>"/>
					<br/>
					<p>Item Discounted Price</p>
					<input type="number" name="item_discount_price" class="form-control" placeholder="In Rupees" value="<?php echo $row["item_discount_price"];?>"/>
					<br/>
					<p>Category</p>
					<select name="item_category" class="form-control">
					<option value="none">--Select Category--</option>
					<?php
					require "dbconnect.php";
					require "db_connect.php";
					$sql="SELECT * FROM category";
					$rows= $conn->query($sql);
					try{
						foreach($rows as $row)
						{
					?>
					<option value="<?php echo $row["category_name"];?>"><?php echo $row["category_name"];?></option>
					<?php
					}
	}
		catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
					}
					?>
					</select>
					<br/>
					<input type="submit" name="submit" class="btn btn-primary" value="edit Item"/>
				</div>
				<div class="col-sm-2">
				</div>
			</div>
			</form>	
		</div>
	</section>
	<?php
	}
	}
		catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
					}
	}
	?>
	<footer>
		<div style="position:fixed; right:10px; bottom:10px;">
			<h2>Developed by <img src="img/pctech.png" style="width:50px; height:auto;"/></h2>
		</div>
	</footer>