<?php
	session_start();
//	if(isset($_SESSION['usuario'])){
//		header('Location: index.php');
//	}
	$usuario=$_SESSION['usuario'];
	
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$puntaje=$_POST['estrellas'];
		$id=$_POST['id'];
		
		
	//	echo "$usuario" . "$password" . "$password2";
		$errores='';
		if(empty($puntaje)){
				$errores.='<li>Actualmente no tienes vehiculos para realizar el viaje</li>';
		}else{
			     $conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
				$statemen = $conexion->prepare('SELECT * FROM puntajes WHERE nombre = :nombre');
				$statemen->execute(array(':nombre' => $id));
				$punt=$statemen->fetchAll();
                foreach ($punt as $post):
                   $total:=$puntaje+$post['total'];
                   $cant:=$post['cant']+1;
                endforeach;
               
            
                $conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
				$statemen = $conexion->prepare('UPDATE puntajes SET total = :total, cant = :cant, 
				 WHERE nombre = :nombre');
				$statemen->execute(array(':total' => $total, 
					':cant' => $cant, 
					':nombre' => $id));
				header('Location: listarMisViajes.php');	
			
		}
		
        }

	

?>