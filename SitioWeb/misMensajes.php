<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	if(!$conexion){
		header('Location: error.php');
	}
	
	$mensajes = obtener_post_de_mensajes($conexion,$usuario);


	require 'views/mensajesView.php';
?>