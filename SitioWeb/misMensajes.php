<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	if(!$conexion){
		header('Location: error.php');
	}
	
	$mensajes = obtener_post_de_mensajes($conexion,$usuario,$blog_config['post_por_pagina']);
	if(!$mensajes){
		header('Location: index.php');
	}

	require 'views/mensajesView.php';
?>