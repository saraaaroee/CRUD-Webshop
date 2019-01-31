<?php

session_start();

	$sUsers = file_get_contents('data.txt');
	$aUsers = json_decode($sUsers);

	$sUserName = $_POST['txtUserName'];
	$sUserPassword = $_POST['txtUserPassword'];

	// ADMIN USER

	$sCorrectAdminUser = "A";
	$sCorrectAdminPassword = "1";
	$sCorrectAdminUserLastname = "Pallesen";
	$sCorrectAdminEmail = "admin@mail.com";
	$sCorrectAdminPhone = "22222222";
	$sCorrectAdminImage = "UserImages\/userimage-59d27bb55e061.jpg";

	// CHECK LOG IN ADMIN USER

	if ( $sUserName == $sCorrectAdminUser && $sUserPassword == $sCorrectAdminPassword )
	{
	 			$_SESSION['LoggedIn'] = true;
				$_SESSION['sUserName'] = $sCorrectAdminUser;
				$_SESSION['sUserRole'] = 'admin';
				$_SESSION['sUserLastName'] = $sCorrectAdminUserLastname;  
				$_SESSION['sUserEmail'] = $sCorrectAdminEmail;
				$_SESSION['sUserPhoneNumber'] = $sCorrectAdminPhone;
				$_SESSION['sUserImage'] = $sCorrectAdminImage;
				// SEND THIS TO CLIENT 
				$sjResponse = '{"login":"admin","userName":"'.$sCorrectAdminUser.'"}';
				echo $sjResponse;
				//exit;
	} else {
		for ($i=0; $i < count($aUsers); $i++)
			{ 
				$sCorrectUsername = $aUsers[$i]->name;
				$sCorrectUserLastname = $aUsers[$i]->lastname;
				$sCorrectPassword = $aUsers[$i]->password;
				$sCorrectEmail = $aUsers[$i]->email;
				$sCorrectPhoneNumber = $aUsers[$i]->phonenumber;
				$sCorrectId = $aUsers[$i]->id;
				$sCorrectImage = $aUsers[$i]->image;
	// CHECK LOG IN NORMAL USER
				if( $sUserName == $sCorrectUsername && $sUserPassword == $sCorrectPassword )
				{
					$_SESSION['LoggedIn'] = true;
					$_SESSION['sUserName'] = $sCorrectUsername;
					$_SESSION['sUserId'] = $sCorrectId;
					$_SESSION['sUserLastName'] = $sCorrectUserLastname;
					$_SESSION['sUserEmail'] = $sCorrectEmail;
					$_SESSION['sUserPhoneNumber'] = $sCorrectPhoneNumber;
					$_SESSION['sUserImage'] = $sCorrectImage;
					$_SESSION['sUserRole'] = 'user';
					$sjResponse = '{"login":"ok","userName":"'.$sCorrectUsername.'"}';
					echo $sjResponse;
					exit;
				}
			}
	// LOG IN ERROR 
	$sjResponse = '{"login":"error"}';
	$_SESSION['LoggedIn'] = false;
	echo $sjResponse;
	}

?>