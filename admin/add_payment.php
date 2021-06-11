<?php
session_start();
	if(isset($_POST["submit"]) and isset($_SESSION["admin"]))
	{
		$payment_name= $_POST["payment"];	
		$item_img= $_POST["fileToUpload"];
		require_once "dbconnect.php";
		require_once "db_connect.php";
		$target_path = "payment/ ";
		$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);
		$check = getimagesize($_FILES["fileToUpload"]["name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} 	
		else if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
			echo "File uploaded successfully!";  
		} else{  
			echo "Sorry";
		}
		mysqli_query($con,"INSERT INTO payment(payment_name,payment_path)
			VALUES('".$payment_name."','".$target_path."' )");
	    mysqli_close($con);	
		header("Location:settings.php");
			exit;
			
			
	}
	else{
		header("Location:login.html");
		exit();
	}
?>