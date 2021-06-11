<?php
	session_start();
	if(isset($_POST["submit"]) and isset($_SESSION["admin"]))
	{
		$item_name= $_POST["item_name"];
		$item_img= $_POST["fileToUpload"];
		$item_price= $_POST["item_price"];
		$item_discount_price= $_POST["item_discount_price"];
		$item_category= $_POST["item_category"];
		$item_display= 1;
		require_once "dbconnect.php";
		require_once "db_connect.php";
		$target_path = "media/ ";
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
		mysqli_query($con,"INSERT INTO item(item_name,item_img,item_price,item_discount_price,item_display, item_category)
			VALUES('".$item_name."','".$target_path."' , '".$item_price."', '".$item_discount_price."', '".$item_display."','".$item_category."')");
	    mysqli_close($con);	
		header("Location:add_item.php");
			exit;
			
			
	}
	else{
		header("Location:login.html");
		exit();
	}
?>