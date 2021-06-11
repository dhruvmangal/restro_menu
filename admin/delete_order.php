<?php
if(isset($_POST["submit"]))
	{
		require "dbconnect.php";
		require "db_connect.php";
		$id= $_POST["order_id"];
		$sql="DELETE FROM orders WHERE order_id= ".$id."";
		try{
			$st = $conn-> prepare( $sql );
			$st-> bindValue( ":id", $id, PDO::PARAM_INT );
			$st-> execute();
		}
		catch(PDOException $e)
		{
			echo "Query Failed:".$e->getMessage();
		}
		header("Location:dashboard.php");
		exit;
	}
?>