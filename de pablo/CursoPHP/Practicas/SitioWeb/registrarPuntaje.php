<?php
	session_start();
//	if(isset($_SESSION['usuario'])){
//		header('Location: index.php');
//	}
	$usuario=$_SESSION['usuario'];
	
	//	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$puntaje=(int)$_POST['estrellas'];
		$id=$_POST['id'];
		require 'functions.php';
		
	//	echo "$usuario" . "$password" . "$password2";
		$errores='';
		if(empty($puntaje)){
				$errores.='<li>Actualmente no tienes vehiculos para realizar el viaje</li>';
		}else{
			     calcular_puntaje($id,$puntaje);
				header('Location: listarMisViajes.php');	
			
		}
		
    //   }

	

?>