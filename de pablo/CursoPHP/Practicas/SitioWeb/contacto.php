<?php
	session_start();
//	if(isset($_SESSION['usuario'])){
//		header('Location: index.php');
//	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		header('Location: index.php');
	}

	require 'views/contactoView.php';

?>