<?php
	session_start();
	require 'functions.php';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	$idpost=$_GET['idpost'];
	$idviaje=$_GET['id'];
	if(!$conexion){
		header('Location: error.php');
	}
	
	$conect=$conexion->prepare("DELETE FROM postulantes WHERE idpostulante ='$idpost' AND idviaje = '$idviaje' ");
	$conect->execute();
	$con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
    mysqli_select_db($con, 'aventon');
    $query = "SELECT * FROM viajes WHERE id = '$idviaje'";
    $resultado = mysqli_query($con, $query);
    $rs = mysqli_fetch_array($resultado);
        $mensaje="El usuario ".$idpost." se a dado de baja del viaje a ".$rs[destino]." ";
        $user= $rs[usuario2];
        echo $mensaje;
		$conect6= $conexion->prepare('INSERT INTO mensajes(mensaje,idviaje,idusuario) VALUES(:mensaje,:idviaje,:idpostulante)');
		$conect6->execute(array(
		':idviaje'=> $idviaje,
		':idpostulante'=> $user,
		':mensaje'=> $mensaje));
	header('Location: index.php');


?>