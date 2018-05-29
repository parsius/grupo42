<?php
	session_start();
	$usuario=$_SESSION['usuario'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$dominio=$_POST['dominio'];
		$tipo=$_POST['tipo'];
		$capacidad=$_POST['capacidad'];
		$modelo=$_POST['modelo'];
		
		
	//	echo "$usuario" . "$password" . "$password2";
		$errores='';
		if(empty($dominio)or empty($tipo) or empty($capacidad) or empty($modelo)){
			$errores.='<li>Por favor rellena todos los campos correctamente </li>';
		}else{
			try{
				$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
			}catch(PDOExeption $e){
				echo "Error:".$e->getMessage();
			}
		}
		if($errores==''){
			$statement=$conexion->prepare('INSERT INTO vehiculos(idauto,dominio,tipo,capacidad,modelo, idusuario3) VALUES (null,:dominio,:tipo,:capacidad,
			:modelo, $usuario)');
			$statement->execute(array(
				':dominio'=>$dominio,
				':tipo'=>$tipo,
				':capacidad'=>$capacidad,
				':modelo'=>$modelo,
				'$usuario => $usuario',
				));
			header('Location: ../SitioWeb/index.php');
		}
		
	}

	require 'views/crearVehiculoView.php';

?>