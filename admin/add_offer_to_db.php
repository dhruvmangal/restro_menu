<?php
if(isset($_POST["add_offer"]))
{
	require "dbconnect.php";
	require "db_connect.php";
	$offer_name= $_POST["offer_name"];
	$discount= $_POST["discount"];
	$date= date('d-m-y');
	mysqli_query($con,"INSERT INTO offers(offer_name,offer_discount,date)
			VALUES('".$offer_name."','".$discount."' , '".$date."')");
	    mysqli_close($con);	
		header("Location:offers.php");
		exit;
			
}
?>