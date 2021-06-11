<?php
if(isset($_POST["delete"]))
	{
		require "dbconnect.php";
		require "db_connect.php";
		$id= $_POST["item_id"];
		$sql="DELETE FROM item WHERE item_id= ".$id."";
		try{
			$st = $conn-> prepare( $sql );
			$st-> bindValue( ":id", $id, PDO::PARAM_INT );
			$st-> execute();
		}
		catch(PDOException $e)
		{
			echo "Query Failed:".$e->getMessage();
		}
		header("Location:show_item.php");
		exit;
	}
?>