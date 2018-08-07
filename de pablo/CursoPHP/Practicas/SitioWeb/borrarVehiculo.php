<?php
	session_start();
	require 'functions.php';
//	if(isset($_SESSION['usuario'])){
//		header('Location: index.php');
//	}
	$usuario=$_SESSION['usuario'];
	$int=id_viaje(1);
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$patente=$_POST['dominio'];
		
	//	echo "$usuario" . "$password" . "$password2";
		$errores='';
		if(empty($patente)){
			$errores.='<li>Por favor rellena todos los campos correctamente </li>';
		}else{
			try{
				$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
			}catch(PDOExeption $e){
				echo "Error:".$e->getMessage();
			}
		}
		if($errores==''){
				$sql = $conexion->prepare('UPDATE vehiculos SET valido = :valido WHERE dominio = :nombre');
	    		$sql->execute(array('nombre' => $patente,
	    			'valido' =>$int));
	   		  //  $resultado = $sql->fetchAll(); 
			header('Location: index.php');
		}
		
	}

	require 'views/borrarVehiculoView.php';

?>