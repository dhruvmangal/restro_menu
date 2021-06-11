<?php
session_start();
	if(isset($_POST["submit"]) and isset($_SESSION["admin"]))
	{
		$item_name= $_POST["item_name"];
		$item_img= $_POST["fileToUpload"];
		$item_price= $_POST["item_price"];
		$item_discount_price= $_POST["item_discount_price"];
		$item_category= $_POST["item_category"];
		echo $item_name;
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
	require "dbconnect.php";
	require "db_connect.php";
	$sql= "UPDATE item SET item_name=".$item_name.", item_img=".$item_img.", item_price=".$item_price.", item_discount_price=".$item_discount_price.", item_category=".$item_category." WHERE item_id=".$item_id."";
	try {
		$st = $conn-> prepare( $sql );
		$st-> bindValue( ":item_id", $item_id, PDO::PARAM_INT );
		$st-> bindValue( ":item_name", $item_name, PDO::PARAM_STR );
		$st-> bindValue( ":item_img", $item_img, PDO::PARAM_STR );
		$st-> bindValue( ":item_price", $item_price, PDO::PARAM_INT );
		$st-> bindValue( ":item_discount_price", $item_discount_price, PDO::PARAM_INT );
		$st-> bindValue( ":item_category", $item_category, PDO::PARAM_STR );
		$st-> execute();
	} catch ( PDOException $e ) {
		echo "Query failed: " . $e-> getMessage();
	}
	
	}
//header("Location:show_item.php");
//exit();	
?>