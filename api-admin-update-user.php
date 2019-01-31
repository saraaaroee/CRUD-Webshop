<?php

$sUserId = $_POST['txtUserId'];
$sUserNewName = $_POST['txtNewName'];
$sUserNewEmail = $_POST['txtNewMail'];
$sUserNewNumber = $_POST['txtNewNumber'];

// Load all the users and decode them to an array
$sUsers = file_get_contents('data.txt');
$aUsers = json_decode($sUsers);

for ($i = 0; $i < count($aUsers); $i++) {
  if ($aUsers[$i]->id == $sUserId) {
  	$aUsers[$i]->name = $sUserNewName;
  	$aUsers[$i]->email = $sUserNewEmail;
    $aUsers[$i]->number = $sUserNewNumber;
    // return;
  }
}

  // var_dump($ajData);
    $sajUpdatedUsers= json_encode($aUsers);
    // var_dump($sajUpdatedData);
    file_put_contents('data.txt', $sajUpdatedUsers);

?>