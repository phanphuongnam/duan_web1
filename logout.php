<?php
	require_once 'commons/db.php'; 	
	session_start();
	session_destroy();
	// setcookie('email',$email,time() - (86400 * 30));
 //         	setcookie('password',$password,time() - (86400 * 30));
	header('location:'.Base_url);

?>