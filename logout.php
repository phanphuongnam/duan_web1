<?php
	require_once 'commons/db.php'; 	
	session_start();
	session_destroy();
	header('location:'.Base_url);

?>