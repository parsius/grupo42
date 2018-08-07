<?php
	require 'functions.php';
	session_start();
	$idpostulante=$_SESSION['usuario'];
	$conexion=conexion();
//	$idviaje=$_GET['id'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$nombreyapellido=$_POST['nombre'];
		$ntarjeta=$_POST['ntarjeta'];
		$codigo=$_POST['codigo'];
		$errores='';
		if(empty($nombreyapellido)or empty($ntarjeta) or empty($codigo) or ($ntarjeta == 000000)){
			$errores.='<li>Por favor rellena todos los campos correctamente </li>';
		}
		if($errores==''){
			$statement=$conexion->prepare('INSERT INTO pagos(idviaje,idusuario,nombreyapellido,ntarjeta,codigo,precio) VALUES(null,:idusuario,:nombreyapellido,:ntarjeta,:codigo,null)');
			$statement->execute(array(
				':idusuario'=>$idpostulante,
				':nombreyapellido'=>$nombreyapellido,
				':codigo'=>$codigo,
				':ntarjeta'=>$ntarjeta,
				':precio'=>$precio));

			header('Location: publicarViaje.php');
		}
		
	}

	require 'views/verificarTarjetaView.php';

?>