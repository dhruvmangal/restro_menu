<?php
$dns="mysql:dbname=pctech";
$usename = "root";
    $pasword = "";
    try{
		$conn = new PDO( $dns, $usename, $pasword );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}	
	catch( PDOException $e )
	{
		echo "connection failed" .$e->getMessage();
	}
?>