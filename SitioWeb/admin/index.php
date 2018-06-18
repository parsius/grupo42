<?php
	session_start();
	require 'config.php';
	require '../functions.php';
	$errores='';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	if(!$conexion){
		header('Location: error.php');
	}
	
	$posts = obtener_post_de_vehiculos($blog_config['post_por_pagina'],$conexion,$usuario);


	require '../views/admin_indexView.php';
?>