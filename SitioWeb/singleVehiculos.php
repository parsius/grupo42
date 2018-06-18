<?php
//	require 'admin/config.php';
	require 'functions.php';

	$conexion = conexion($bd_config);
	$id_viaje = id_viaje($_GET['id']);
	if(!$conexion){
		header('Location: error.php');
	}

	if(empty($id_viaje)){
		header('Location: index.php');
	}

	$post =  listar_vehiculos_por_id($conexion, $id_viaje);
	if(!$post){
		header('Location: index.php');
	}

	$post = $post[0];
	require 'views/singleView.php';
?>