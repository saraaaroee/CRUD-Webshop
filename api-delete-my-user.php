<?php
session_start(); 

$sUserId = $_SESSION['sUserId'];

// Load all the users and decode them to an array
$sUsers = file_get_contents('data.txt');
$aUsers = json_decode($sUsers);

for ($i = 0; $i < count($aUsers); $i++) {
  if( $aUsers[$i]->id == $sUserId){
			array_splice($aUsers, $i, 1);
			echo "you have deleted yourself";
		}
	}

	$sajUsersUpdated = json_encode($aUsers);
	file_put_contents('data.txt', $sajUsersUpdated);

?> 