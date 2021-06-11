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
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
	margin-top:0px;
  height: 15px;
  width: 15px;
  margin-left:2px;
  margin-right:2px;
  background-color: #bbb;
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
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 300px;
  width: 40px;
  height:40px;
  margin-top: -20px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 50%;
  user-select: none;
  background-color:gray;
}
.next {
  right: 60;
  border-radius: 50%;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
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
h1,h2,h3,h4,h5,h6,p, button{
	font-family:sniglet;
}
.loader {
	border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #A89776; /* Blue */
  border-radius: 50%;
  width: 190px;
  height: 190px;
  animation: spin 2s linear infinite;
  margin-left:42%;
  margin-right:42%;
  margin-top:-150px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
#inner-cart{
	width:40%;
	background-color:#E9EBEE;
	float:right;
	height:100%;
}
#outer-cart{
	width:60%;
	float:left;
	height:100%;
}
#menu{
	margin:0px 50px;
}
@media screen and (max-width: 600px){
	#outer-cart{
		width:0%;
	}
  #inner-cart{
	width:100%;
	background-color:#E9EBEE;
	float:right;
	height:100%;
	}
	#menu{
	margin:0px 0px;
}
		
}


</style>

</head>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){
	var x= document.getElementById("loader");
	if(x.style.display=="block")
	{
    document.getElementById("loader").style.display="block";
    setTimeout("hide()", 2000);  // 5 seconds
	}
});

function hide() {
    document.getElementById("loader").style.display="none";
}
 
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

function addtocart()
{
	
}
<?php
if(isset($_SESSION["speak"]))
{
?>
function speak (message) {
  var msg = new SpeechSynthesisUtterance(message)
  var voices = window.speechSynthesis.getVoices()
  msg.voice = voices[5]
  window.speechSynthesis.speak(msg)
}

speak('<?php echo 'hello'.$_SESSION["name"].', Welcome to the restaurant';?>')
<?php
}
unset($_SESSION["speak"]);
?>
</script>
<body id="body" style="background-color:#E9EBEE;">
	<div id="loader" style="z-index:2; display:none; position:fixed; top:0; left:0px; height:100%; width:100%; background-color:#191919;">
		<div style="margin-top:270px;">
			
			<center><img src="img/logo.png" style="margin-top:50px; margin-left:25px;"></center>
				<div class="loader">
					
				</div>	
		</div>
		
	</div>
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

	<div id="cart" style="display:none;position:fixed; top:0px; right:0px; background-color:rgba(80, 80, 80, 0.7); width:100%; height:100%;  z-index:2; border:1px solid black; box-shadow:1px 1px 2px gray;">
		<div id="outer-cart" style="" onclick="close_sidenav()">
		</div>
	<div id="inner-cart">
		<div class="container-fluid" style="background-color:#191919;">
			<div class="row">
				<div class="col-sm-10 col-xs-10">
				
						<h6 style="color:white; font-family:Sniglet;">  My Cart(<?php echo count($_SESSION["cart"]);?>)</h6> 
						
				<br/>
				</div>
				<div class="col-sm-2 col-xs-2" style="float:right;" onclick="close_sidenav()">
			<p style="font-size:20px;color:white; cursor:pointer;">&times;</p>
		</div>
			</div>
		</div>
		<div class="container-fluid" style="background-color:white; padding:10px 10px; height:10%;">
			<div class="row">
				<div class="col-sm-10 col-xs-10">
					<h6 style="font-family: Sniglet;">Subtotal</h6>
				</div>
				<div class="col-sm-2 col-xs-2">
				<?php
					$total=0;
					for($i=0;$i<count($_SESSION["cart"]);$i++)
					{
						$total= $total+$_SESSION["cart"][$i]["item_quantity"]*$_SESSION["cart"][$i]["item_price"];
					}
					echo '&#8377;'.$total;
				?>
				</div>
			</div>
			
		</div>
		<div class="container-fluid" style="height:72%;overflow-y:scroll; ">
				
			<?php
				for($i=0; $i<count($_SESSION["cart"]); $i++)
				{
			?>
			<div class="row" style="background-color:white; padding:10px 0px; margin:10px -15px; ">
					<div class="col-sm-3">
					
						<img src="admin/<?php echo $_SESSION["cart"][$i]["item_img"]?>" style="width:80px; height:80px;">
					</div>
					<div class="col-sm-9">
						<h5 style="font-family:sniglet;"><?php echo $_SESSION["cart"][$i]["item_name"]?></h5>
						
						<div style=" margin:0px 0px; padding:5px 0px; height:50px;">
						<div  style="float:left; margin-top:12px;">
						<form method="post" action="addToCart.php">
						<input type="hidden" name="item_id" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="item_name" value="<?php echo $_SESSION["cart"][$i]["item_name"]?>"/>
						<input type="hidden" name="item_img" value="<?php echo $_SESSION["cart"][$i]["item_img"]?>"/>
						<input type="hidden" name="item_price" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="quantity" value="<?php echo $_SESSION["cart"][$i]["item_quantity"]?>"/>
						<button type="submit" name="cart" value="removecart" style="width:25px; height:25px; float:left;margin:0px 5px; font-size:15px; border-radius:50%; border:none; background-color:#191919; color:#A89776; font-family:sniglet;"><b>&minus;</b></button>
					
						</form>
						</div>
						<div style="float:left; margin:4px 12px; height:20px; font-family:sniglet;"><h4><?php echo $_SESSION["cart"][$i]["item_quantity"]?></h4></div>
						<div style="float:left; margin-top:12px;">
						<form method="post" action="addToCart.php">
						<input type="hidden" name="item_id" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="item_name" value="<?php echo $_SESSION["cart"][$i]["item_name"]?>"/>
						<input type="hidden" name="item_img" value="<?php echo $_SESSION["cart"][$i]["item_img"]?>"/>
						<input type="hidden" name="item_price" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="quantity" value="<?php echo $_SESSION["cart"][$i]["item_quantity"]?>"/>
						<button type="submit" name="cart" value="incrementtocart" style="width:25px; height:25px; margin:0px 5px; font-size:15px; border-radius:50%; border:none; background-color:#191919; color:#A89776; font-family:sniglet;"><b>&plus;</b></button>
						
						</form>
						</div>
						
						<div style="float:left;margin:10px 10px;">
							<h5 style="font-family:sniglet;">&times;  &#8377;<?php echo $_SESSION["cart"][$i]["item_price"];?></h5>
						</div>
						<div style="float:right;margin:10px 10px;">
							 <h5 style="font-family:sniglet;"> &#8377;<?php echo $_SESSION["cart"][$i]["item_price"]*$_SESSION["cart"][$i]["item_quantity"];?></h5>
						</div>
						</div>						
					</div>
					
			</div>
			<?php
				}
				
			?>	
			
		</div>
		<div class="container-fluid" style="background-color:white; margin:5px 0px;" >
			<div class="row" style="padding:10px; ">
				<div class="col-sm-12">
					
					<a href="checkout.php"><div class="form-control btn btn-primary" style="background-color:#51AA1B; height:40px;border:none;"><p style="float:left; color:white;">Checkout</p><p style="float:right; color:white; padding:0px 20px;"><?php echo'&#8377;'.$total;?></p></div></a>
				</div>
			</div>
		</div>
	</div>
	</div>
	<header style="width:100%; position:fixed; left:0px; z-index:1;">
		<div class="container-fluid" style=" background-color:#191919;">
			<div class="row">
				<div class="col-sm-6 col-xs-3">
				
					<center><img src="img/logo.png" style="margin:10px 10px; height:40px; width:auto;"/></center>
				</div>
				<div class="col-sm-2">
					
				</div>
				<div class="col-sm-2 col-xs-4" onclick="open_sidenav()">
					<center><p style="color:white;padding-top:10px;"><i class="fa fa-cart-plus" aria-hidden="true"></i> My Cart(<?php echo count($_SESSION["cart"])?>)</p></center>
				</div>
				<div class="col-sm-2 col-xs-5">
					<center><p style="color:white;padding-top:10px;"><i class="fa fa-user"></i> Hello, <?php echo $_SESSION["name"];?></p></center>
				</div>
			</div>
		</div>
	</header>
	<section style="width:100%; padding-top:60px;;">
	</section>
	<section style="padding:3% 0%; background-color:white; margin:0px 0px; border-radius:5px;">
		<div class="slideshow-container">


<?php
require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM sliders ORDER BY slider_id ASC ";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
?>
<div class="mySlides fade">
  <img src="admin/<?php echo $row["slider_path"];?>" style="width:100%">
  <div class="text"></div>
</div>
<?php
	}
				}
				catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
				}		
?>

</div>
<a class="prev" onclick="plusSlides(-1)"><p style="margin-top:-10px; color:white;">&#10094;</p></a>
  <a class="next" onclick="plusSlides(1)"><p style="margin-top:-10px; color:white;">&#10095;</p></a>
<br>

<div style="text-align:center">
<?php
require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM sliders ORDER BY slider_id ASC ";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
?>
  
	<span class="dot"></span> 
<?php
	}
				}
				catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
				}		
?>

  </div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

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
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

	</section>
	<section id="menu" style="background-color:#E9EBEE; padding:10px; height:auto; ">
		<div class="container-fluid">
		<?php
		require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM category";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
				$category= $row["category_name"];
				
		?>
			<div class="row">
			<?php
			
		require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM item where item_display='1' AND item_category='".$category."' ORDER BY item_id ASC ";
		$rows= $conn->query($sql);
		if($category=='none')
		{
			echo '<h3>Other Items</h3>';
		}
		else{
			echo '<h3>'.$category.'</h3>';
		}
		try{
			foreach($rows as $row)
			{
					
		?>
				<div class="col-sm-3 col-xs-6" style=" padding:10px 0px; " >
					<div style=" border: 1px solid #F3F3F3; margin:0px 0px; height:350px;background-color:white; padding:10px;" id="<?php echo $row["item_id"];?>">
						<div style="background-color:#51AA1B; color:white; border-radius:5px; padding:0px 1px; width:35%; height:15px; margin-bottom:2px;  ">
							<?php if(($row["item_price"]- $row["item_discount_price"])>0){?>
							<center><h6 style="color:white; font-size:13px;"> &#8377;<?php echo $row["item_price"]- $row["item_discount_price"];?> Off</h6></center>
							<?php
							}?>
						</div>
					<center><img src="admin/<?php echo $row["item_img"]?>" style="width:120px; height:120px; border-radius:5px;"/></center>
						<div style="height:30%;">
						<center><h6 style=" color:#191919;"><?php echo $row["item_name"];?></h6></center>
					
					
							<h5 style="float:left; margin-left:30px;"><span style="color:gray;"><strike> &#8377;<?php echo $row['item_price'];?></strike></span> &#8377;<?php echo $row['item_discount_price'];?>	</h5>
						</div>
						<div style="">
						<?php
						$show=0;
						for($i=0; $i<count($_SESSION["cart"]); $i++)
						{
							
							if($_SESSION["cart"][$i]["item_id"]==$row["item_id"])
							{	
								$show=1;
								break;
							}
							
							
						}
						if($show==0)
						{
						?>
						<form action="addToCart.php" method="post">
						<input type="hidden" name="item_id" value="<?php echo $row['item_id'];?>"/>
						<input type="hidden" name="item_name" value="<?php echo $row['item_name'];?>"/>
						<input type="hidden" name="item_img" value="<?php echo $row["item_img"];?>"/>
						<input type="hidden" name="item_price" value="<?php echo$row["item_discount_price"]?>"/>
						<input type="hidden" name="quantity" value="1"/>	
						<center><button name="cart" type="submit" value="addtocart"class="btn" style="border:1px solid gray; background-color:#191919; color:#A89776; border-radius:15px;">Add To Cart <i class="fa fa-cart-plus"></i></button></center>
						</form>
						<?php
						}else{
							?>
							<div class="col-sm-12">
						
						<div style=" margin:0px 0px; padding:5px 0px; height:50px; text-align:center;">
						<div  style="float:left; margin-top:12px;">
						<form method="post" action="addToCart.php">
						<input type="hidden" name="item_id" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="item_name" value="<?php echo $_SESSION["cart"][$i]["item_name"]?>"/>
						<input type="hidden" name="item_img" value="<?php echo $_SESSION["cart"][$i]["item_img"]?>"/>
						<input type="hidden" name="item_price" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="quantity" value="<?php echo $_SESSION["cart"][$i]["item_quantity"]?>"/>
						<button type="submit" name="cart" value="removecart" style="width:25px; height:25px; float:left;margin:0px 10px; font-size:15px; border-radius:50%; border:none; background-color:#191919; color:#A89776; font-family:sniglet;"><b>&minus;</b></button>
					
						</form>
						</div>
						<div style="float:left; margin:2px 8px; height:20px; font-family:sniglet;">
						<h4><?php echo $_SESSION["cart"][$i]["item_quantity"]?></h4></div>
						<div style="float:left; margin-top:12px;">
						<form method="post" action="addToCart.php">
						<input type="hidden" name="item_id" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="item_name" value="<?php echo $_SESSION["cart"][$i]["item_name"]?>"/>
						<input type="hidden" name="item_img" value="<?php echo $_SESSION["cart"][$i]["item_img"]?>"/>
						<input type="hidden" name="item_price" value="<?php echo $_SESSION["cart"][$i]["item_id"]?>"/>
						<input type="hidden" name="quantity" value="<?php echo $_SESSION["cart"][$i]["item_quantity"]?>"/>
						<button type="submit" name="cart" value="incrementtocart" style="width:25px; height:25px; margin:0px 10px; font-size:15px; border-radius:50%; border:none; background-color:#191919; color:#A89776; font-family:sniglet;"><b>&plus;</b></button>
						
						</form>
						</div>
						
						</div>						
					</div>
							<?php
						}	
						?>
					<!--<center><h4 style="border:1px solid gray; margin:0px 100px;"><span style="float:left; margin:0px 5px;">+</span> x <span style="float:right; margin:0px 5px;">-</span></h4></center>-->
					
					</div>
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
			<?php
				}
				}
				catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
				}
				?>
				
		</div>
	</section>
	<!--<div style="position:fixed; bottom:50px; right:50px;">
		<button style="width:100px; height:100px; border-radius:50%; font-size:20px;" class="btn">
			Menu
		</button>-->
		</div>
</body>
</html>