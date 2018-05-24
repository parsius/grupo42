<?php
	require 'admin/config.php';
	require 'functions.php';

	$conexion = conexion($bd_config);
	if(!$conexion){
		header('Location: error.php');
	}

	if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){
		$busqueda= limpiarDatos($_GET['busqueda']);

		$statement = $conexion->prepare('SELECT * FROM viajes WHERE titulo LIKE :busqueda or texto LIKE :busqueda');

		$statement->execute(array(':busqueda' => "%$busqueda%"));
		$resultados = $statement->fetchAll();

		if(empty($resultados)){
			$titulo = 'No se encontraron resultados asociados a' . $busqueda;
		}else{
			$titulo = 'Resultado de la busqueda' . $busqueda;
		}
	}else{
		header('Location: ' . RUTA . '/index.php');
	}
	require 'views/buscarView.php';
?>
