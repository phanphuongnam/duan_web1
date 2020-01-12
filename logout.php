<?php
	require_once 'commons/db.php'; 	
	session_start();
	// session_destroy();
	setcookie('name', $user['name'], time() - (86400 * 30), "/");
	setcookie('email', $user['email'], time() - (86400 * 30), "/");
	setcookie('id', $user['id'], time() - (86400 * 30), "/");
	// setcookie('email',$email,time() - (86400 * 30));
 //         	setcookie('password',$password,time() - (86400 * 30));
	header('location:'.Base_url);

?>