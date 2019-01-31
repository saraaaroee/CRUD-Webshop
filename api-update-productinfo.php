<?php

$sProductId = $_POST['txtProductId'];
$sProductNewName = $_POST['txtNewName'];
$sProductNewPrice = $_POST['txtNewPrice'];

// Load all the users and decode them to an array
$sProducts = file_get_contents('products.txt');
$aProducts = json_decode($sProducts);

for ($i = 0; $i < count($aProducts); $i++) {
  if ($aProducts[$i]->id == $sProductId) {
  	$aProducts[$i]->name = $sProductNewName;
  	$aProducts[$i]->price = $sProductNewPrice;
    // return;
  }
}

  // var_dump($ajData);
    $sajUpdatedProducts = json_encode($aProducts);
    // var_dump($sajUpdatedData);
    file_put_contents('products.txt', $sajUpdatedProducts);
    // file_put_contents('data-backup.txt', $sajUpdatedData);
    //$sajUpdatedProducts = file_get_contents('products.txt');
    //var_dump($sajUpdatedProducts);
    //echo $id;

?>