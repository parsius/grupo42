<?php
	require 'admin/config.php';
	require 'functions.php';
//	session_start();
	

	$conexion = conexion();
	$usuario=$_GET['usuario'];
//	$usuario=$GLOBALS;
//	if(!$conexion){
//		header('Location: error.php');
//	}
	
	$posts = obtener_post_de_vehiculos($blog_config['post_por_pagina'],$conexion,$usuario);
	
	if(!$posts){
		header('Location: error.php' );
	}
	
	
	require 'views/listarVehiculosView.php';
?>