<?php
// GET THE IMAGE AND SAVE IT WITH UNIQUE ID
$sFileExtension = pathinfo($_FILES['fileProductImage']['name'], PATHINFO_EXTENSION);
$sFolder = 'ProductImages/';
$sFileName = 'productimage-'.uniqid().'.'.$sFileExtension;
$sSaveFileTo = $sFolder.$sFileName;
move_uploaded_file( $_FILES['fileProductImage']['tmp_name'], $sSaveFileTo);

// GET ALL USER INFORMATION
$jNewProduct = json_decode('{}');
$jNewProduct->id = uniqid();
$jNewProduct->name = $_POST['txtProductName'];
$jNewProduct->price = $_POST['txtPrice'];
$jNewProduct->image = $sFolder.$sFileName;

// Load all the products and decode them to an array
$sProducts = file_get_contents('products.txt');
$aProducts = json_decode($sProducts);

// Add the new user to the array
if(!empty($jNewProduct->name)){
array_push( $aProducts, $jNewProduct );	
};


// Encode all the products and save it to the file;
$sNewProduct = json_encode($aProducts);
file_put_contents('products.txt', $sNewProduct);


echo $sNewProduct;
?>