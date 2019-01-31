<?php
	// The id that the client passes
	$sUserId = $_GET['id'];
	$sUsers = file_get_contents( 'data.txt' );
	// convert the text to an object (array)
	$aUsers = json_decode( $sUsers );
	
	for($i = 0; $i < count($aUsers); $i++){
		// $jItem = $aUsers[$i];
		if( $aUsers[$i]->id == $sUserId){
			array_splice($aUsers, $i, 1);
			echo "this user is now deleted";
		}
	}

	$sajUsersUpdated = json_encode($aUsers);
	file_put_contents('data.txt', $sajUsersUpdated);

?>
