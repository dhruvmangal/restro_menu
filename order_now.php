<?php
date_default_timezone_set("Asia/Kolkata"); 
if(isset($_POST["order"]))
{
$name= $_POST["name"];
$phone= $_POST["phone"];
echo $phone;
$offer= $_POST["offer"];
$discount= $_POST["discount"];
$date= date('y-m-d');
$time= date('h:i:s');
$payment=$_POST["payment"];	
$fullfill=0;

session_start();
$table_no= $_SESSION["table"];
echo $table_no;
for($i=0; $i<count($_SESSION["cart"]); $i++)
{
		$item_id= $_SESSION["cart"][$i]["item_id"];
		$item_name= $_SESSION["cart"][$i]["item_name"];
		$item_img= $_SESSION["cart"][$i]["item_img"];
		$item_price= $_SESSION["cart"][$i]["item_price"];
		$item_quantity= $_SESSION["cart"][$i]["item_quantity"];
		$gst= $_SESSION["cart"][$i]["item_price"]*5/100;
		echo $item_name;
		require "dbconnect.php";
require "db_connect.php";
	$item_discount_price= $_SESSION["cart"][$i]["item_price"]-($_SESSION["cart"][$i]["item_price"]*$discount/100);
	mysqli_query($con,"INSERT INTO orders(name, phone, offer, discount, item_id, item_name, item_img,item_quantity, item_price, item_discounted_price, date, time, payment, fullfill, table_no, gst)
			VALUES('".$name."','".$phone."' ,'".$offer."' ,'".$discount."','".$item_id."','".$item_name."','".$item_img."','".$item_quantity."','".$item_price."','".$item_discount_price."','".$date."','".$time."','".$payment."','".$fullfill."','".$table_no."','".$gst."' )");
	    mysqli_close($con);
		
}
$_SESSION["cart"]=array();
unset($_SESSION["offer_name"]);
header("location:reorder.php");
}
?>