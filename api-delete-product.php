<?php
	// The id that the client passes
	$sProductId = $_GET['id'];
	$sProducts = file_get_contents( 'products.txt' );
	// convert the text to an object (array)
	$aProducts = json_decode( $sProducts );
	// Get rid of the price from the array
	for($i = 0; $i < count($aProducts); $i++){
		// $jItem = $aProducts[$i];
		if( $aProducts[$i]->id == $sProductId){
			array_splice($aProducts, $i, 1);
			echo "this product is now deleted";
		}
	}

	$sajProductsUpdated = json_encode($aProducts);
	file_put_contents('products.txt', $sajProductsUpdated);



?>