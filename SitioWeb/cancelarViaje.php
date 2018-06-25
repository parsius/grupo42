<?php
	session_start();
	require 'admin/config.php';
	require 'functions.php';
	$conexion=conexion();
	$us=$_GET['usua'];
    $idviaje=$_GET['id'];
	$usuario=$_SESSION['usuario'];
	
	if(!$conexion){
		header('Location: error.php');
	}
	$invalido=1;
	$conexion=conexion();
	$conect=$conexion->prepare('SELECT * FROM postulantes WHERE idviaje = :idviaje');
	$conect->execute(array('idviaje' => $idviaje));
	 //MENSAJE
    $con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM viajes WHERE id = '$idviaje'";
        $resultado = mysqli_query($con, $query);
        $rs = mysqli_fetch_array($resultado);
        $mensaje="El viaje a ".$rs[destino]." de ".$rs[idusuario2]." fue cancelado.";
        echo $mensaje;
    //FIN ARMADO MENSAJE
    $resultado = $conect->fetchAll();
    $conect=$conexion->prepare('UPDATE viajes SET estado = :estado WHERE id = :idviaje');
	$conect->execute(array('idviaje' => $idviaje,
                            ':estado' => $invalido));
	foreach ($resultado as $row) {
	    $user=$row['idpostulante'];
	    $conect=$conexion->prepare('INSERT INTO mensajes(idviaje,idusuario,mensaje) VALUES(:idviaje, :idusuario, :mensaje)');
		$conect->execute(array(':idviaje' => $idviaje,
			':mensaje' => $mensaje,
			':idusuario' => $user)); 
	}
	header('Location: index.php');


?>