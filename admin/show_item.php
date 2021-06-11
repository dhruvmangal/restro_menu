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
<link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet">
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
	<header style="position:fixed; top:0px; left:0px; width:100%; z-index:1;">
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
	<section style="width:20%; height:100%; float:left; margin-top:10px; position:fixed; z-index:2;">
		<div>
			<center><a href="dashboard.php"><h5>Current Orders</h5></a></center>
			
		</div>
		<hr/>
		<div >
			<center><a href="fullfilled.php"><h5>Fullfilled Orders</h5></a></center>
			
		</div>
		<hr/>
		<div>
			<center><a href="add_item.php"><h5>Add an Item</h5></a></center>
		</div>
		<hr/>
		<div  style="background-color:#191919; color:white" >
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
			<center><a href="settings.php"><h5>Settings</h5></a></center>
		</div>
		<hr/>
	</section>
	<section style="width:80%; height:auto; float:left; background-color:#E9EBEE; padding-top:50px; margin-left:20%; ">
	<center><h4 style="">By clicking on "Hide/Show" the items will be Hidden/ shown in Users Cart</h4></center>
		<div class="container-fluid">
		<?php
		require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM item ORDER BY item_id DESC ";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
		?>
			<div class="row" style="background-color:white; margin:0px 10px;">
				<div class="col-sm-4">
					<img src="<?php echo $row["item_img"]?>" style="width:100px; height:100px;"/>	
				</div>
				<div class="col-sm-4">
					<h5><?php echo $row["item_name"]?></h5>
					<h5><span><strike>&#8377;<?php echo $row["item_price"]?></strike> </span><span>&#8377;<?php echo $row["item_discount_price"]?></span></h5>
					<h5><?php echo $row["item_category"]?></h5>
				</div>
				<div class="col-sm-1">
				<?php if($row["item_display"]=='1')
				{
					?>
				
					<form method="get" action="change_display.php">
						<input type="hidden" name="item_id" value="<?php echo $row["item_id"];?>"/>	
						<center><input type="submit" name="hide" value="hide" class="btn btn-primary" style="margin-top:30px;"data-toggle="tooltip" title="Hooray!"/></center>
					</form>
					
				
				<?php
				}
				
				else{
					?>
					<form method="get" action="change_display.php">
						<input type="hidden" name="item_id" value="<?php echo $row["item_id"];?>"/>	
						<center><input type="submit" name="hide" value="show" class="btn btn-primary" style="margin-top:30px;"data-toggle="tooltip" title="Hooray!"/></center>
					</form>
				
					<?php
					
				}?>
				</div>
				
				<div class="col-sm-1">
				<form method="post" action="delete_item.php">
				<input type="hidden" name="item_id" value="<?php echo $row["item_id"];?>"/>	
						<center><input type="submit" name="delete" value="Delete" class="btn btn-primary" style="margin-top:30px;"data-toggle="tooltip" title="Hooray!"/></center>
				</form>
				</div>
			</div>
			<br/>
			<?php
			}
		}
		catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
					}
			?>
			<br/>
			
		</div>
	</section>
	<footer>
		<div style="position:fixed; right:10px; bottom:10px;">
			<h2>Developed by <img src="img/pctech.png" style="width:50px; height:auto;"/></h2>
		</div>
	</footer>