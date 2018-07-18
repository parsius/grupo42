<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$usuario=$_SESSION['usuario'];
	$idviaje=$_GET['id'];
	$idpost=$_GET['idpost'];
	$aceptado=1;
	if(!$conexion){
		header('Location: error.php');
	}
	$conect1=$conexion->prepare('SELECT * FROM viajes WHERE id = :id');
	$conect1->execute(array(':id'=>$idviaje));
	$resultado = $conect1->fetchAll(); 
	foreach ($resultado as $row) {
	   	$result=$row['capacidad']; 						
	}   						
	if($result > 0 ){
		$conect2=$conexion->prepare('UPDATE postulantes SET aceptado = :aceptado WHERE idviaje = :idviaje AND idpostulante = :idpost');
		$conect2->execute(array(':aceptado'=>$aceptado,
		':idpost'=> $idpost,	
		':idviaje'=>$idviaje));

		$con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM viajes WHERE id = '$idviaje'";
        $resultado = mysqli_query($con, $query);
        $rs = mysqli_fetch_array($resultado);
        $mensaje="Fuiste rechazado del viaje a  ".$rs[destino]." de ".$rs[idusuario2]." ";
        echo $mensaje;
		$conect6= $conexion->prepare('INSERT INTO mensajes(mensaje,idviaje,idusuario) VALUES(:mensaje,:idviaje,:idpostulante)');
		$conect6->execute(array(
		':idviaje'=> $idviaje,
		':idpostulante'=> $idpost,
		':mensaje'=> $mensaje));
	
		header('Location: index.php');
	}else{
		header('Location: errorAceptarPostulante.php');

	}   					
	
	

	require 'views/listarMisViajesView.php';
?>
