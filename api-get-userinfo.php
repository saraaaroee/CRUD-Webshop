<?php


session_start(); 

$sUserId = $_SESSION['sUserId'];
//echo $sUserId;

// Load all the users and decode them to an array
$sUsers = file_get_contents('data.txt');
$aUsers = json_decode($sUsers);
//var_dump( $aUsers );

for ($i = 0; $i < count($aUsers); $i++) {
  if ($aUsers[$i]->id == $sUserId) {
      $sUserName = $aUsers[$i]->name;
      $sUserLastName = $aUsers[$i]->lastname;
      $sUserEmail = $aUsers[$i]->email;
      $sUserNumber = $aUsers[$i]->phonenumber;
      $sUserImage = $aUsers[$i]->image;
      //echo $sUserName;

      $sjSessionUser = '{}';
      $jSessionUser = json_decode($sjSessionUser);
      $jSessionUser->name = $sUserName;
      $jSessionUser->lastname = $sUserLastName;
      $jSessionUser->email = $sUserEmail;
      $jSessionUser->phonenumber = $sUserNumber;
      $jSessionUser->image = $sUserImage;

      $sjSessionUser = json_encode($jSessionUser);
      echo $sjSessionUser;
      return;
  }
}

      

// DOESN'T WORK - have to log out before you see changes when you update 

// session_start();

// 	//$aUsers = json_decode($sUsers);
// 	//echo $sUsers;

// 	$sjSessionUser = '{}';
//    	$jSessionUser = json_decode($sjSessionUser);
//    	$jSessionUser->name = $_SESSION['sUserName'];
//    	$jSessionUser->lastname = $_SESSION['sUserLastName'];
//    	$jSessionUser->email = $_SESSION['sUserEmail'];
//    	$jSessionUser->phonenumber = $_SESSION['sUserPhoneNumber'];
//    	$jSessionUser->image = $_SESSION['sUserImage'];

//    	$sjSessionUser = json_encode($jSessionUser);
// 	echo $sjSessionUser;

?>