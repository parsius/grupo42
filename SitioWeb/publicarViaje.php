<?php
	session_start();
//	if(isset($_SESSION['usuario'])){
//		header('Location: index.php');
//	}
	$usuario=$_SESSION['usuario'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$origen=$_POST['origen'];
		$hora=$_POST['hora'];
		$tipo=$_POST['tipo'];
		$destino=$_POST['destino'];
		$fecha=$_POST['fecha'];
		$patente=$_POST['dominio'];
		
	//	echo "$usuario" . "$password" . "$password2";
		$errores='';
		if(empty($origen)or empty($hora) or empty($tipo) or empty($destino) or empty($fecha)or empty($patente)){
			$errores.='<li>Por favor rellena todos los campos correctamente </li>';
		}else{
			try{
				$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
				$sql = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :nombre');
	    		$sql->execute(array('nombre' => $usuario));
	   		    $resultado = $sql->fetchAll(); 
	    		foreach ($resultado as $row) {
	    			$user=$row['usuario'];
	    		}	
			}catch(PDOExeption $e){
				echo "Error:".$e->getMessage();
			}
		}
		if($errores==''){
			$statement=$conexion->prepare('INSERT INTO viajes(id,origen,destino,fecha,tipo,hora,idusuario2,idauto2) VALUES (null,:origen,:destino,:fecha,:tipo,:hora,:id,:idauto)');
			$statement->execute(array(
				':origen'=>$origen,
				':destino'=>$destino,
				':fecha'=>$fecha,
				':tipo'=>$tipo,
				':hora'=>$hora,
				':id'=>$user,
				':idauto'=>$patente,
				));
			header('Location: index.php');
		}
		
	}

	require 'views/publicarViajeView.php';

?>