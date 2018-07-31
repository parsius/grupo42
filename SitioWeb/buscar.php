<?php
	require 'admin/config.php';
	require 'functions.php';

	$conexion = conexion();
	if(!$conexion){
		header('Location: error.php');
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){
		$busqueda= limpiarDatos($_GET['busqueda']);

		$statement = $conexion->prepare('SELECT * FROM viajes WHERE destino LIKE :busqueda or fecha LIKE :busqueda or tipo LIKE :busqueda');

		$statement->execute(array(':busqueda' => "%$busqueda%"));
		$resultados = $statement->fetchAll();

		if(empty($resultados)){
			$titulo = 'No se encontraron resultados asociados a: ' . $busqueda;
		}else{
			$titulo = 'Resultado de la busqueda: ' . $busqueda;
		}
	}else{
		header('Location: ' . RUTA . '/index.php');
	}
	require 'views/buscarView.php';
?>
