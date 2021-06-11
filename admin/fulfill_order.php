<?php
if(isset($_POST["submit"]))
{
	$order_id= $_POST["order_id"];
	$fullfill=1;
	require "dbconnect.php";
	$sql= "UPDATE orders SET fullfill=".$fullfill." WHERE order_id=".$order_id."";
	try {
		$st = $conn-> prepare( $sql );
		$st-> bindValue( ":order_id", $order_id, PDO::PARAM_INT );
		$st-> bindValue( ":fullfill", $fullfill, PDO::PARAM_INT );
		$st-> execute();
	} catch ( PDOException $e ) {
		echo "Query failed: " . $e-> getMessage();
	}
}
header("location:dashboard.php");
?>