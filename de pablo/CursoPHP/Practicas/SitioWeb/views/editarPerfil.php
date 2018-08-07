<?php 
	session_start();
	require '../admin/config.php';
	require '../functions.php';
	$errores = '';
//	$usuario=$_SESSION['usuario'];
	   $dominio = $_POST['dominio'];
//BUSCO SI EL NOMBRE EXISTE
        $id = $_POST['usuario'];
        $con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT usuario FROM usuario WHERE usuario = '$id'";
        $resultado = mysqli_query($con, $query);
        $totalFilas    =    mysqli_num_rows($resultado); 
        $rs= mysqli_fetch_all($resultado);
        if ($totalFilas == 0 AND $rs['mail'] !== $modelo){  
        //MODIFICO EL NOMBRE EN LAS TABLAS
         $conexion=conexion();
         $statemen = $conexion->prepare('UPDATE usuario SET usuario = :id WHERE usuario = :usuario ');
		 $statemen->execute(array(':id' => $id,
                                 ':usuario' => $dominio));   
         $statemen = $conexion->prepare('UPDATE vehiculos SET usuario3 = :id WHERE usuario3 = :usuario ');
		 $statemen->execute(array(':id' => $id,
                                 ':usuario' => $dominio));      
         $statemen = $conexion->prepare('UPDATE viajes SET usuario2 = :id WHERE usuario2 = :usuario ');
		 $statemen->execute(array(':id' => $id,
                                 ':usuario' => $dominio));
          $statemen = $conexion->prepare('UPDATE postulantes SET idpiloto = :id WHERE idpiloto = :usuario ');
		  $statemen->execute(array(':id' => $id,
                                 ':usuario' => $dominio));
           $statemen = $conexion->prepare('UPDATE mensajes SET idusuario = :id WHERE idusuario = :usuario ');
		   $statemen->execute(array(':id' => $id,
                                 ':usuario' => $dominio));  
        //MODIFICO EL RESTO DE VARIABLES
		
	//	$dominio = $_POST['id'];
		$capacidad = $_POST['capacidad'];
		$tipo = $_POST['tipo'];
		$modelo = $_POST['modelo'];
		$conexion=conexion();
		$statemen = $conexion->prepare('UPDATE usuario SET nombre = :capacidad, apellido = :tipo, 
		email = :modelo WHERE usuario = :id');
		$statemen->execute(array(
			':capacidad' => $capacidad, 
			':tipo' => $tipo, 
			':modelo' => $modelo, 
			':id' => $dominio));
		header('Location: ' . RUTA . '/index.php');
		
	//dominio= usuario, capacidad=nombre, tipo= apellido, modelo= email

	require '../views/editarView.php';
        } else{header('Location: ' . RUTA . '/errorPerfil.php');}


?>