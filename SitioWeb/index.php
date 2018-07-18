<?php
	require 'admin/config.php';
	require 'functions.php';

	$conexion = conexion();
//	if(!$conexion){
//		header('Location: error.php');
//	}

	$posts = obtener_post($blog_config['post_por_pagina'],$conexion);
	
	if(!$posts){
		header('Location: errorMostrarViajesIndex');
	}
	
	
	require 'views/indexView.php';
?>