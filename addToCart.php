<?php
	session_start();
	$_SESSION["open_cart"]="true";
	if(isset($_SESSION["name"]))
	{
		$item_id= $_POST["item_id"];
		$item_name= $_POST["item_name"];
		$item_img= $_POST["item_img"];
		$item_price= $_POST["item_price"];
		$item_quantity= $_POST["quantity"];
		$option= $_POST["cart"];
		if($option=='addtocart')
		{
			addToCart($item_id, $item_name, $item_img, $item_price, $item_quantity);
		}
		if($option=='incrementtocart')
		{
			incrementtocart($item_id, $item_name, $item_img, $item_price, $item_quantity);
		}
		if($option=='removecart')
		{
			removecart($item_id, $item_name, $item_img, $item_price, $item_quantity);
		}
		print_cart();
		header("Location:index.php#".$item_id);
		exit();
	}
	function addToCart($item_id, $item_name, $item_img, $item_price, $item_quantity){
		$arr= array("item_id"=> $item_id,
			"item_name"=> $item_name,
			"item_img"=>$item_img,
			"item_price"=>$item_price,
			"item_quantity"=> $item_quantity
		);
		if(isset($_SESSION["cart"]))
		{
			$count= count($_SESSION["cart"]);
			$_SESSION["cart"][$count]= $arr;
		}
		else{
			$_SESSION["cart"][0]= $arr;
		}
			
	}
	
	function print_cart() 
	{
		print_r($_SESSION["cart"]);
	}
	function incrementtocart($item_id, $item_name, $item_img, $item_price, $item_quantity)
	{
		for($i=0; $i<=count($_SESSION["cart"]);$i++)
		{
			if($_SESSION["cart"][$i]["item_id"]==$item_id)
			{	
				$_SESSION["cart"][$i]["item_quantity"]=$item_quantity+1;
				break;
			}
		}
	}
	function removecart($item_id, $item_name, $item_img, $item_price, $item_quantity)
	{
		if($item_quantity>1)
		{
			for($i=0; $i<=count($_SESSION["cart"]);$i++)
			{	
				if($_SESSION["cart"][$i]["item_id"]==$item_id)
				{	
					$_SESSION["cart"][$i]["item_quantity"]=$item_quantity-1;
					break;
				}
			}
		}
		else{
			if($item_quantity==1)
			{
				for($i=0; $i<=count($_SESSION["cart"]);$i++)
				{		
					if($_SESSION["cart"][$i]["item_id"]==$item_id)
					{	
						for($j=$i;$j<count($_SESSION["cart"])-1;$j++)
						{
							$_SESSION["cart"][$j]= $_SESSION["cart"][$j+1];
						}
						array_pop($_SESSION["cart"]);
						
					}
				}
			}
			
		}
	}
?>