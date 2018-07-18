<?php 
	session_start();
	require 'config.php';
	require '../functions.php';
	$errores = '';
//	$usuario=$_SESSION['usuario'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dominio = $_POST['dominio'];
	//	$dominio = $_POST['id'];
		$capacidad = $_POST['capacidad'];
		$tipo = $_POST['tipo'];
		$modelo = $_POST['modelo'];
		$conexion=conexion();
		if($capacidad==0){
			header('Location:' . RUTA . '/errorEditarCapacidad.php');
		}else{
		$statemen = $conexion->prepare('UPDATE vehiculos SET capacidad = :capacidad, tipo = :tipo, 
		modelo = :modelo WHERE dominio = :id');
		$statemen->execute(array(
			':capacidad' => $capacidad, 
			':tipo' => $tipo, 
			':modelo' => $modelo, 
			':id' => $dominio));
		header('Location: ' . RUTA . '/index.php');
		}
	}else{
		
		$dominio = $_GET['id'];
	//	$id_viaje = id_usuario($_GET['id']);
		$conexion=conexion();
		$post = listar_vehiculos_por_id($conexion,$dominio);

		

		$post = $post[0];
	}

	require '../views/editarView.php';



?>