<?php
session_start();

?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/cs.css">
<script src="js/bootstrap.js" type="text/JavaScript"></script>
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
#cart{
	position:fixed;
	float:left;
	width:40%;
	height:auto;
	background-color:#E9EBEE;
	border:1px solid gray;
	height:95%;
	overflow-y:scroll;
}
#bill{
	 width:60%;
}
@media screen and (max-width: 600px){
	#cart{
		position:fixed;
		float:left;
		width:0%;
		height:auto;
		background-color:#E9EBEE;
		border:1px solid gray;
		height:95%;
		overflow-y:scroll;
	}	
	#bill{
		 width:100%;
	}
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
<body>
	
	
	<header style="width:100%; position:fixed; left:0px; z-index:1;">
		<div class="container-fluid" style=" background-color:#191919;">
			<div class="row">
				<div class="col-sm-6 col-xs-4">
				
					<img src="img/logo.png" style="margin:0px 10px; height:60px; width:auto;"/>
				</div>
				<div class="col-sm-2 col-xs-2">
					
				</div>
				
				<div class="col-sm-4 col-xs-6">
					<center><h5 style="color:white;padding-top:15px;"><i class="fa fa-user"></i> Welcome, <?php echo $_SESSION["name"];?></h5></center>
				</div>
			</div>
		</div>
	</header>
	<section style="width:100%; padding-top:60px;">
	</section>
	<section id="cart" style="">
		<div class="container-fluid">
			<div class="row" style="background-color:white;">
				<div class="col-sm-12">
				
				<h5> My Cart(<?php echo count($_SESSION["cart"]);?>)</h5>
						
				<br/>
				</div>
				
			</div>	
			<?php
				$gt=0;
				for($i=0; $i<count($_SESSION["cart"]); $i++)
				{
					$t= $_SESSION["cart"][$i]["item_quantity"]*$_SESSION["cart"][$i]["item_price"];
					$gt= $gt+$t;
			?>
			<div class="row" style="background-color:white; padding:10px 0px; margin:10px -15px; ">
					<div class="col-sm-4">
					
						<img src="admin/<?php echo $_SESSION["cart"][$i]["item_img"]?>" style="width:80px; height:80px;">
					</div>
					<div class="col-sm-8">
						<h6><?php echo $_SESSION["cart"][$i]["item_name"]?></h6>
						<h6>Total: &#8377;<?php echo $_SESSION["cart"][$i]["item_price"]?>X <?php echo $_SESSION["cart"][$i]["item_quantity"]?>= &#8377;<?php echo $_SESSION["cart"][$i]["item_quantity"]*$_SESSION["cart"][$i]["item_price"]?></h6>
								
					</div>
					
			</div>
			<?php
				}
				
			?>	
			<div class="row" style="padding:20px;">
				<div class="col-sm-12">
					<button class="btn" style="width:100%; font-size:20px;">Subtotal: &#8377;<?php echo $gt;?></button>
				</div>
			</div>
			
		</div>
	</section>
	
	<section id="bill" style="float:right;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<center><h3>Checkout</h3></center>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 col-xs-0">
				</div>
				<div class="col-sm-6 col-xs-12">
				<form method="post" action="add_offer.php">
					<h4>Your Offer code</h4>
					<?php
						if(isset($_SESSION["offer_name"]) and isset($_SESSION["discount"])){
					?>
					<input type="text" name="offer_code" class="form-control" style="width:70%; float:left;"value=" <?php echo $_SESSION["offer_name"];?> " />
					
					 
					
					<?php
						}
						else{
					?>
					<input type="text" name="offer_code" class="form-control" style="width:70%; float:left;" />
					<?php
					
						}?>
					<input type="submit" name="submit" value="Apply" class="form-control btn btn-primary" style="width:20%; float:left;"/>
					</form>
					
				</div>
				<div class="col-sm-3 col-xs-0">
				</div>
			</div>
			<br/>
			</div>
			<div class="container-fluid">
			<?php
				for($i=0; $i<count($_SESSION["cart"]);$i++)
				{
			?>
			<div class="row">
			
				<div class="col-sm-3 col-xs-0">
				</div>
				<div class="col-sm-4 col-xs-6">
					<?php echo $_SESSION["cart"][$i]["item_name"];?>
				</div>
				<div class="col-sm-2 col-xs-3">
				<?php echo $_SESSION["cart"][$i]["item_quantity"];?>&times;<?php echo '&#8377;'.$_SESSION["cart"][$i]["item_price"];?>
				</div>
				<div class="col-sm-2 col-xs-3">
				<?php echo'&#8377;'. $_SESSION["cart"][$i]["item_quantity"]*$_SESSION["cart"][$i]["item_price"];?>
				</div>
			</div>
				
			<?php
				}
			?>
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-8"  style="border-bottom:1px dashed black;">
				</div>
				<div class="col-sm-1">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 col-xs-0">
				</div>
				<div class="col-sm-6 col-xs-9">
				<h5>Total</h5>
				</div>
				<div class="col-sm-2 col-xs-3">
					<h5> <?php echo '&#8377;'. $gt;?></h5>
				</div>
				<div class="col-sm-1">
				</div>
			</div>
			<?php
				if(isset($_SESSION["offer_name"]))
				{
			?>
			<div class="row">
				<div class="col-sm-3 col-xs-0">
				</div>
				<div class="col-sm-6 col-xs-9">
					<h5 style="color:green;">Offer Applied</h5>
					<p style="color:green; font-size:12px;">(<?php echo$_SESSION["offer_name"]; ?>)</p>
				</div>
				<div class="col-sm-2 col-xs-3">
					<h5 style="color:green;">-&#8377;<?php echo ($gt*$_SESSION["discount"]/100);?></h5>
				</div>
			</div>
			<?php
				}
			?>
			<div class="row">
				<div class="col-sm-3 col-xs-0">
				</div>
				<div class="col-sm-6 col-xs-9">
					<h5 style="color:red;">GST@ 5%</h5>
				</div>
				<div class="col-sm-2 col-xs-3">
					<h5 style="color:red;">+&#8377;<?php echo $gt*5/100;?></h5>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-8"  style="border-bottom:1px dashed black;">
				</div>
				<div class="col-sm-1">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3  col-xs-0">
				</div>
				<div class="col-sm-6 col-xs-9">
					<h5 >Grand Total</h5>
				</div>
				<div class="col-sm-2 col-xs-3">
				<?php
					if(isset($_SESSION["offer_name"]))
					{
				?>
					<h5><b>&#8377;<?php echo $gt-($gt*$_SESSION["discount"]/100)+$gt*5/100;?></b></h5>
					<?php
					}else{
					?>
					<h5><b>&#8377;<?php echo $gt+$gt*5/100;?></b></h5>
					<?php
					}
					?>
				</div>
			</div>
			</div>
			<div class="container-fluid">
			<div class="row">
			</div>
			<div class="row">
				<div class="col-sm-3 col-xs-0">
				</div>
				
				<div class="col-sm-6 col-xs-12">
				<?php
				if(isset($_SESSION["offer_name"])and isset($_SESSION["discount"]) and $_SESSION["offer_name"]!="none")
				{
				?>
				<h3>You need to pay: &#8377; <?php echo ($gt)-($gt*$_SESSION["discount"]/100)+($gt*5/100);?></h3>
				<?php
				}else{
				?>
				<h3>You need to pay: &#8377; <?php echo $gt+($gt*5/100);?></h3>
				<?php
				}
				?>
				</div>
				<div class="col-sm-3">
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-sm-3 col-xs-0">
				</div>
				
				<div class="col-sm-6 col-xs-12">
				<h4>Choose your payment method</h4>
				</div>
				<div class="col-sm-3 col-xs-0">
				</div>
				
			</div>
			<div class="row">
				
				<div class="col-sm-3 col-xs-0">
				</div>
				<div class="col-sm-2 col-xs-4">
					<button id="Cash" onclick="open_model('Cash',this, 40)"  class="btn" style="color:black; font-size:20px; background-color:white">Cash</button>
				</div>
				<?php
				require "dbconnect.php";
				require "db_connect.php";
				$sql="SELECT * FROM payment";
				$rows= $conn->query($sql);
				try{
				foreach($rows as $row)
				{
				?>
				
				<div class="col-sm-2 col-xs-4">
					<button id="<?php echo $row["payment_name"];?>" class="btn" style="color:black; font-size:20px; background-color:white"onclick="open_model('<?php echo $row["payment_name"]?>',this,'<?php echo $row["payment_id"]?>')" ><?php echo $row["payment_name"]?></button>
				
				</div>
				<div id="<?php echo $row["payment_id"]?>"style="display:none;position:fixed; top:0px; left:0px;width:100%; height:100%; z-index:1; background-color:rgba(74, 77, 78, 0.6);">
		<div style="margin:50px 400px;background-color:white; padding:20px;">
			<div style="float:right;margin-top:-50px; " onclick="close_model('<?php echo $row["payment_id"]?>')">
				<h1 style="color:gray;font-size:50px; margin:15px;">&times;</h1>
			</div>
			<div class="container-fluid">
				<div class="row">
					<center>
					<img src="admin/<?php echo $row['payment_path']?>" style="width:400px; height:auto;"/>
					</center>
				</div>
			</div>
			
			<center>
		</div>
		
	</div>	
  
  
				<?php
				}
		}
			catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
				}
				?>
				
				<div class="col-sm-0">
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6">
					<br/>
					<form action="order_now.php" method="post">
					<input type="hidden" name="name" value="<?php echo $_SESSION["name"];?>"/>
					<input type="hidden" name="phone" value="<?php echo $_SESSION["phone"];?>"/>
					<input type="hidden" name="payment" value="Cash" id="payment_method"/>
					<?php
						if(isset($_SESSION["offer_name"]))
						{
					?>
					<input type="hidden" name="offer" value="<?php echo $_SESSION["offer_name"]?>"/>
					<input type="hidden" name="discount" value="<?php echo $_SESSION["discount"]?>"/>
					<?php
						}else{
					?>
					<input type="hidden" name="offer" value="none"/>
					<input type="hidden" name="discount" value="none"/>
					<?php
						}
					?>
					<button type="submit" name="order" value="order" class="btn btn-primary" style="width:100%;">Order Now</button>
					</form>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
	</section>
	<script>
	function open_model(id,x,y)
	{
		var z= document.getElementById('payment_method').value;
		
		if(y!=40)
		{
		document.getElementById(y).style.display='block';
		document.getElementById('payment_method').value= id;
		}
		
		if(document.getElementById('payment_method').value == id)
		{	x.style.color="white";
		x.style.backgroundColor="black";
		}
		document.getElementById(z).style.backgroundColor="white";
		document.getElementById(z).style.color= 'black';
		
		
	}
	function close_model(id)
	{
		document.getElementById(id).style.display='none';
		
	}
	</script>