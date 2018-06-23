<?php 
	session_start();
	require '../admin/config.php';
	require '../functions.php';
	$errores = '';
//	$usuario=$_SESSION['usuario'];
	
		$dominio = $_POST['dominio'];
	//	$dominio = $_POST['id'];
		$capacidad = $_POST['capacidad'];
		$tipo = $_POST['tipo'];
		$modelo = $_POST['modelo'];
		$conexion=conexion();
		$statemen = $conexion->prepare('UPDATE usuario SET nombre = :capacidad, apellido = :tipo, 
		email = :modelo WHERE usuario = :id');
		$statemen->execute(array(
			':capacidad' => $capacidad, 
			':tipo' => $tipo, 
			':modelo' => $modelo, 
			':id' => $dominio));
		header('Location: ' . RUTA . '/index.php');
		
	//dominio= usuario, capacidad=nombre, tipo= apellido, modelo= email

	require '../views/editarView.php';



?>