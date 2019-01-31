<?php

// GET INFORMATION
$jNewEmail = json_decode('{}');
$jNewEmail->email = $_POST['txtSubscribeMail'];

// Load all the users and decode them to an array
$sEmails = file_get_contents('emails.txt');
$aEmails = json_decode($sEmails);

// Add the new user to the array
if(!empty($jNewEmail->email)){
array_push( $aEmails, $jNewEmail );	
};


$sNewEmail = json_encode($aEmails);
file_put_contents('emails.txt', $sNewEmail);


echo $sNewEmail;
?>