<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	$id=$_GET['id'];
	if(!$conexion){
		header('Location: error.php');
	}
	
	$posts = obtener_post_de_postulantes_aceptados($blog_config['post_por_pagina'],$conexion,$id);

	if(!$posts){
		header('Location: errorParaViajesPendientes.php');
	}


	require 'views/verCopilotosAceptadosView.php';
?>