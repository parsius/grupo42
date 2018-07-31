<?php
	require 'functions.php';
	session_start();
	$idpostulante=$_SESSION['usuario'];

//	$idviaje=$_GET['id'];
//	$idpiloto=$_GET['user'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$nombreyapellido=$_POST['nombre'];
		$ntarjeta=$_POST['ntarjeta'];
		$codigo=$_POST['codigo'];
		$idviaje=$_POST['idviaje'];
		$idpiloto=$_POST['user'];
		$precio=$_POST['precio'];
		$errores='';
		try{
			if($ntarjeta !== 000000){
			$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
			$stat2 = $conexion->prepare('SELECT * FROM postulantes WHERE idpostulante = :idpostulante AND idviaje = :idviaje LIMIT 2 ');
			$stat2->execute(array(
				':idviaje' => $idviaje,
				':idpostulante' => $idpostulante));
				$result2 = $stat2->fetch();
			if (($idpostulante !== $idpiloto) && ($result2 == false)) {
				$conect2 = $conexion->prepare('INSERT INTO postulantes(idpostulante,idviaje,idpiloto) VALUES(:postu,:idviaje,:idpiloto)');
				$conect2->execute(array(':idviaje' => $idviaje,
									':postu'=>$idpostulante,
									':idpiloto'=>$idpiloto));
				$statement=$conexion->prepare('INSERT INTO pagos(idviaje,idusuario,nombreyapellido,codigo,precio) VALUES(:idviaje,:idusuario,:nombreyapellido,:codigo,:precio)');
				$statement->execute(array(
				':idviaje'=>$idviaje,
				':idusuario'=>$idpostulante,
				':nombreyapellido'=>$nombreyapellido,
				':codigo'=>$codigo,
				':precio'=>$precio));
				header('Location: index.php');
			}else{
				header('Location: errorParaPostularse.php');
			}
		}else{
			$errores='<li>EL numnero de tarjeta no es valido<li>';
		}
		}catch(PDOExeption $e){
			echo "Error:".$e->getMessage();
			
		}
		
	}

	require 'views/postularseView.php';

?>