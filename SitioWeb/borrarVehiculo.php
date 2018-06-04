<?php
	session_start();
//	if(isset($_SESSION['usuario'])){
//		header('Location: index.php');
//	}
	$usuario=$_SESSION['usuario'];
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
				$sql = $conexion->prepare('DELETE FROM vehiculos WHERE dominio = :nombre');
	    		$sql->execute(array('nombre' => $patente));
	   		    $resultado = $sql->fetchAll(); 
			header('Location: index.php');
		}
		
	}

	require 'views/borrarVehiculoView.php';

?>