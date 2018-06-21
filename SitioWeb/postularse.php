<?php
	require 'functions.php';
	session_start();
	$idpostulante=$_SESSION['usuario'];
	$errores='';
//	$idviaje=$_GET['id'];
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$idviaje=$_POST['idviaje'];
		$idpiloto=$_POST['idpiloto'];
		try{
			$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
//			$stat = $conexion->prepare('SELECT * FROM postulantes WHERE idpostulante = :idpiloto LIMIT 1 ');
//			$stat->execute(array(
//				':idpiloto' => $idpiloto));
//			$result = $stat->fetch();
			$stat2 = $conexion->prepare('SELECT * FROM postulantes WHERE idpostulante = :idpostulante AND idviaje = :idviaje LIMIT 2 ');
			$stat2->execute(array(
				':idviaje' => $idviaje,
				':idpostulante' => $idpostulante));
				$result2 = $stat2->fetch();
			if (($idpostulante !== $idpiloto) && ($result2 == false)) {
			//	$conect = $conexion->prepare('SELECT * FROM viajes WHERE id = :id');
			//	$conect->execute(array('id' => $idviaje));
  		    //	$result = $conect->fetchAll();
	   	//	    foreach ($result as $r) {
	    //			$capacidad=$r['capacidad'];
	    //		}	
		//		if($capacidad>0){
		//		$actcapacidad = $capacidad -1;
		//		$statemen = $conexion->prepare('UPDATE viajes SET capacidad = :capacidad WHERE id = :id');
		//		$statemen->execute(array(
		//		':capacidad' => $actcapacidad,
		//		':id'=> $idviaje));
				$conect2 = $conexion->prepare('INSERT INTO postulantes(idpostulante,idviaje,idpiloto) VALUES(:postu,:idviaje,:idpiloto)');
				$conect2->execute(array(':idviaje' => $idviaje,
									':postu'=>$idpostulante,
									':idpiloto'=>$idpiloto));
				header('Location: index.php');
			}else{
				$errores .= '<li>No se puede postular a este viaje porque ya esta postulado o es su propio viaje</li>';
			}

		}catch(PDOExeption $e){
			echo "Error:".$e->getMessage();
			
		}
		
	}

	require 'views/postularseView.php';

?>