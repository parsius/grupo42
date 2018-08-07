<?php
	require 'admin/config.php';
	require 'functions.php';
	session_start();
	$usuario=$_SESSION['usuario'];
	$conexion = conexion();
//	if(!$conexion){
//		header('Location: error.php');
//	}

	$posts = obtener_post_de_vehiculos($blog_config['post_por_pagina'],$conexion,$usuario);
	
	if(!$posts){
		header('Location: errorParaPublicarViajes.php');
	}else{
		header('Location: validarTarjeta.php');
	}
	
	
	
?>