<?php
echo $_POST["payment_id"];
if(isset($_POST["submit"]))
	{
		require "dbconnect.php";
		require "db_connect.php";
		$id= $_POST["payment_id"];
		$sql="DELETE FROM payment WHERE payment_id= ".$id."";
		try{
			$st = $conn-> prepare( $sql );
			$st-> bindValue( ":id", $id, PDO::PARAM_INT );
			$st-> execute();
		}
		catch(PDOException $e)
		{
			echo "Query Failed:".$e->getMessage();
		}
		header("Location:payment.php");
		exit;
	}
?>