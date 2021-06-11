<?php
session_start();
	if(isset($_POST["submit"]) and isset($_SESSION["admin"]))
	{
		$category= $_POST["category"];
		$category_display= 1;
		$restro_id=1;
		require_once "dbconnect.php";
		require_once "db_connect.php";
		mysqli_query($con,"INSERT INTO category(restro_id,category_name,category_use)
			VALUES('".$restro_id."','".$category."' , '".$category_display."')");
	    mysqli_close($con);	
		header("Location:settings.php");
			exit;
	}
	else{
		header("Location:login.php");
		exit();
	}
?>