<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$idviaje=$_GET['id'];
	$usuario=$_SESSION['usuario'];
	$mensaje="El viaje fue cancelado";
	if(!$conexion){
		header('Location: error.php');
	}
	
	$conexion=conexion();
	$conect=$conexion->prepare('SELECT * FROM postulantes WHERE idviaje = :idviaje');
	$conect->execute(array('idviaje' => $idviaje));
	$resultado = $conect->fetchAll(); 
	foreach ($resultado as $row) {
	    $user=$row['idpostulante'];
	    $conect=$conexion->prepare('INSERT INTO mensajes(idviaje,idusuario,mensaje) VALUES(:idviaje, :idusuario, :mensaje)');
		$conect->execute(array(':idviaje' => $idviaje,
			':mensaje' => $mensaje,
			':idusuario' => $user)); 
	}
	header('Location: index.php');


?>