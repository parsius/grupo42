<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	if(!$conexion){
		header('Location: error.php');
	}
	
	$posts = obtener_post_de_mensajes($blog_config['post_por_pagina'],$conexion,$usuario);


	require 'views/listarMisViajesView.php';
?>