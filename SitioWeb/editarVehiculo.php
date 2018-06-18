<?php
	session_start();
//	if(isset($_SESSION['usuario'])){
//		header('Location: index.php');
//	}
	$usuario=$_SESSION['usuario'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$modelo=$_POST['modelo'];
		$capacidad=$_POST['capacidad'];
		$patente=$_POST['dominio'];
		
	//	echo "$usuario" . "$password" . "$password2";
		$errores='';
		if(empty($patente)){
				$errores.='<li>Actualmente no tienes vehiculos para realizar el viaje</li>';
		}else{
			try{
				$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
				$statemen = $conexion->prepare('UPDATE vehiculos SET capacidad = :capacidad, modelo = :modelo, 
				 WHERE dominio = :patente');
				$statemen->execute(array(':capacidad' => $capacidad, 
					':modelo' => $modelo, 
					':patente' => $patente));
				header('Location: index.php');	
			}catch(PDOExeption $e){
				echo "Error:".$e->getMessage();
			}
		}
		
	}

	require 'views/editarVehiculoView.php';

?>