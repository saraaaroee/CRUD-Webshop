<?php 
// Load all the users and decode them to an array
$sAddedProducts = file_get_contents('cart.txt');
$aAddedProducts = json_decode($sAddedProducts);

for ($i = 0; $i < count($aAddedProducts); $i++) {
  unset( $aAddedProducts[$i]->image );
}

$sAddedProducts = json_encode($aAddedProducts);
echo $sAddedProducts;
?>