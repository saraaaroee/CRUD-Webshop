<?php
session_start(); 

$sUserId = $_SESSION['sUserId'];
$sUserNewName = $_POST['txtMyNewName'];
$sUserNewEmail = $_POST['txtMyNewMail'];
$sUserNewNumber = $_POST['txtMyNewNumber'];

// Load all the users and decode them to an array
$sUsers = file_get_contents('data.txt');
$aUsers = json_decode($sUsers);

for ($i = 0; $i < count($aUsers); $i++) {
  if ($aUsers[$i]->id == $sUserId) {
  	$aUsers[$i]->name = $sUserNewName;
  	$aUsers[$i]->email = $sUserNewEmail;
    $aUsers[$i]->phonenumber = $sUserNewNumber;
    // return;
  }
}
    $sajUpdatedUsers = json_encode($aUsers);
    //var_dump($sajUpdatedUsers);
    file_put_contents('data.txt', $sajUpdatedUsers);
    

?>