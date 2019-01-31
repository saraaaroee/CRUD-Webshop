<?php 

$sAddedProducts = file_get_contents('cart.txt');
$aAddedProducts = json_decode($sAddedProducts);

$aAddedProducts = []; 

$saAddedProducts = json_encode($aAddedProducts); 
file_put_contents('cart.txt', $saAddedProducts);

echo $saAddedProducts;


//var_dump($aAddedProducts);

?> 