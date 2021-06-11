<?php
session_start();
	if(isset($_POST["submit"]) and isset($_SESSION["admin"]))
	{
		$item_img= $_POST["fileToUpload"];
		require_once "dbconnect.php";
		require_once "db_connect.php";
		$target_path = "slider/ ";
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
		mysqli_query($con,"INSERT INTO sliders(slider_path)
			VALUES('".$target_path."' )");
	    mysqli_close($con);	
		header("Location:sliders.php");
			exit;
			
			
	}
	else{
		header("Location:login.html");
		exit();
	}
?>