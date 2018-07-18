<?php
	require '../SitioWeb/functions.php';
	session_start();
	$usuario=$_SESSION['usuario'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dominio=$_POST['dominio'];
		$tipo=$_POST['tipo'];
		$capacidad=$_POST['capacidad'];
		$modelo=$_POST['modelo'];
		$errores='';
		if(empty($dominio)or empty($tipo) or empty($capacidad) or empty($modelo) or ($capacidad == 0)){
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
				//$ex=$conexion->prepare("SELECT * FROM usuario WHERE usuario = '" . $usuario . "'");
				//$result=$ex->execute();
				
			}catch(PDOExeption $e){
				echo "Error:".$e->getMessage();
			}
		}
		if($errores==''){
			$statement=$conexion->prepare('INSERT INTO vehiculos(idauto,dominio,tipo,capacidad,modelo,idusuario3) VALUES (null,:dominio,:tipo,:capacidad,
			:modelo, :id)');
			$statement->execute(array(
				':dominio'=>$dominio,
				':tipo'=>$tipo,
				':capacidad'=>$capacidad,
				':modelo'=>$modelo,
				':id'=>$user));
			header('Location: ../SitioWeb/index.php');
		}
		
	}

	require 'views/crearVehiculoView.php';

?>