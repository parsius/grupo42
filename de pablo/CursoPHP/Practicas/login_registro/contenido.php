<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		require 'views/contenidoView.php';
	}else{
		header('Location: login.php');
	}
?>