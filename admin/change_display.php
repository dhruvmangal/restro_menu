<?php
if(isset($_GET["hide"]))
{
	$item_id= $_GET["item_id"];
	$hide= $_GET["hide"];
	if($hide=="hide")
	{
		$item_display=0;
	}
	else{
		$item_display=1;
	}
	require "dbconnect.php";
	$sql= "UPDATE item SET item_display=".$item_display." WHERE item_id=".$item_id."";
	try {
		$st = $conn-> prepare( $sql );
		$st-> bindValue( ":item_id", $item_id, PDO::PARAM_INT );
		$st-> bindValue( ":item_display", $item_display, PDO::PARAM_INT );
		$st-> execute();
	} catch ( PDOException $e ) {
		echo "Query failed: " . $e-> getMessage();
	}
	
}
header("Location:show_item.php");
exit();	
?>