<?php 
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$errores = '';
//	$usuario=$_SESSION['usuario'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$id = $_POST['id'];
	//	$dominio = $_POST['id'];
		$hora = $_POST['hora'];
		$tipo = $_POST['tipo'];
		$fecha =$_POST['fecha'];
		$origen = $_POST['origen'];
		$destino = $_POST['destino'];
		$conexion=conexion();
		$statemen = $conexion->prepare('UPDATE viajes SET hora = :hora, tipo = :tipo, 
		fecha = :fecha, origen = :origen, destino = :destino WHERE id = :id');
		$statemen->execute(array(
			':hora' => $hora, 
			':tipo' => $tipo, 
			':fecha' => $fecha,
			':origen' => $origen, 
			':destino' => $destino,  
			':id' => $id));
		header('Location: ' . RUTA . '/index.php');
		
	}else{
		
		$id = id_viaje($_GET['id']);
	//	$id_viaje = id_usuario($_GET['id']);
		$conexion=conexion();
		$post = obtener_post_por_id($conexion,$id);

		

		$post = $post[0];
	}

	require 'views/editarViajeView.php';



?>