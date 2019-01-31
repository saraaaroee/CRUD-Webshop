<?php
// GET THE IMAGE AND SAVE IT WITH UNIQUE ID
$sFileExtension = pathinfo($_FILES['fileUserImage']['name'], PATHINFO_EXTENSION);
$sFolder = 'UserImages/';
$sFileName = 'userimage-'.uniqid().'.'.$sFileExtension;
$sSaveFileTo = $sFolder.$sFileName;
move_uploaded_file( $_FILES['fileUserImage']['tmp_name'], $sSaveFileTo);

// GET ALL USER INFORMATION
$jNewUser = json_decode('{}');
$jNewUser->id = uniqid();
$jNewUser->name = $_POST['txtName'];
$jNewUser->lastname = $_POST['txtLastName'];
$jNewUser->email = $_POST['txtEmail'];
$jNewUser->phonenumber = $_POST['txtPhoneNumber'];
$jNewUser->password = $_POST['txtPassword'];
$jNewUser->nickname = $_POST['txtNickName'];
$jNewUser->image = $sFolder.$sFileName;

// Load all the users and decode them to an array
$sUsers = file_get_contents('data.txt');
$aUsers = json_decode($sUsers);

// Add the new user to the array
if(!empty($jNewUser->name)){
array_push( $aUsers, $jNewUser );	
};


// Encode all the users and save it to the file;
$sNewUsers = json_encode($aUsers);
file_put_contents('data.txt', $sNewUsers);


echo $sNewUsers;
?>