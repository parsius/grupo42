<?php 
	require 'functions.php';
	$conexion=conexion();
	$eliminar=0;
	$usuario=$_GET['user'];

	$statement=$conexion->prepare("UPDATE usuario SET cuentaactiva = '$eliminar' WHERE usuario = '$id' ");
	$statement->execute();
	header('Location:  http://localhost/CursoPHP/Practicas/SitioWeb/index.php');




?>