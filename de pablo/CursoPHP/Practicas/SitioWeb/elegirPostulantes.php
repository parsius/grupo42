<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$idpostulante=$_SESSION['usuario'];
	$idviaje=$_GET['id'];
	if(!$conexion){
		header('Location: error.php');
	}
	
	$posts = obtener_post_de_postulantes($blog_config['post_por_pagina'],$conexion,$idviaje);
	if(!$posts){
		header('Location: errorPostulantes.php');
	}

	require 'views/elegirPostulantesView.php';
?>