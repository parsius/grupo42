<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	$idviaje=$_GET['id'];
	if(!$conexion){
		header('Location: error.php');
	}
	$conect=$conexion->prepare('UPDATE postulantes SET aceptado = :aceptado WHERE idviaje = :id');
	


	require 'views/listarMisViajesView.php';
?>