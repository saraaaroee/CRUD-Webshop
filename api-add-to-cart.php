<?php 
$sProductId = $_GET['id'];
//echo json_encode($sProductId);

// Load all the users and decode them to an array
$sProducts = file_get_contents('products.txt');
$aProducts = json_decode($sProducts);


for ($i = 0; $i < count($aProducts); $i++) {
  if ($aProducts[$i]->id == $sProductId) {
  	$productName = $aProducts[$i]->name;
  	$productPrice = $aProducts[$i]->price;
  	$sjAddedProduct = json_encode($aProducts[$i]);
  
  }
}

$sAddedProduct = file_get_contents('cart.txt');
$aAddedProducts = json_decode($sAddedProduct);

//$ajAddedProducts = [];
$jAddedProduct = json_decode('{}');
$jAddedProduct->name = $productName;
$jAddedProduct->price = $productPrice;


array_push( $aAddedProducts, $jAddedProduct );	



// Encode all the products and save it to the file;
$sProductsToCart = json_encode($aAddedProducts);
file_put_contents('cart.txt', $sProductsToCart);


echo $sProductsToCart;
?>