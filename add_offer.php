<?php
session_start();
if(isset($_POST["submit"])){
	$offer_code= $_POST["offer_code"];
	$offer_name= "none";
	$discount="none";
		require "dbconnect.php";
		require "db_connect.php";
		$sql="SELECT * FROM offers where offer_name='$offer_code'";
		$rows= $conn->query($sql);
		try{
			foreach($rows as $row)
			{
				$offer_name=$row["offer_name"];
				$discount= $row["offer_discount"];
			}
		}catch(PDOException $e){
						echo "Query failed:" .$e->getMessage();
				}
				$_SESSION["offer_name"]= $offer_name;
				$_SESSION["discount"]= $discount;
				header("location:checkout.php");
}
?>