<?php
	require '../SitioWeb/functions.php';
	session_start();
	if(isset($_SESSION['usuario'])){
		header('Location: index.php');
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$usuario=filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$dni=$_POST['dni'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$fecha=$_POST['fecha'];
		$email=$_POST['email'];
		
	//	echo "$usuario" . "$password" . "$password2";
		$errores='';
		if(empty($usuario)or empty($password) or empty($password2) or empty($nombre) or empty($apellido) or empty($dni) or empty($email)){
			$errores.='<li>Por favor rellena todos los campos correctamente </li>';
		}else{
			try{
				$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
			}catch(PDOExeption $e){
				echo "Error:".$e->getMessage();
			}
			$statement=$conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario LIMIT 1');
			$statement->execute(array(':usuario' => $usuario));
			$resultado=$statement->fetch();
			
			if($resultado != false){
				$errores .= '<li>El nombre de usuario ya existe</li>';
			}
			
			if($password != $password2){
				$errores .='<li>Las contraseñas no coinciden</li>';
			}

			if (getAge($fecha) == true) {
				$errores .= '';
			}else{
				$errores .='<li>No cumple con la edad requerida</li>';
				
			}

		}
		if($errores==''){
			$statement=$conexion->prepare('INSERT INTO usuario(id,nombre,usuario,apellido,email,pass,dni,fecha) VALUES (null,:nombre,:usuario,:apellido,
			:email, :pass, :dni, :fecha)');
			$statement->execute(array(
				':usuario'=>$usuario,
				':pass'=>$password,
				':nombre'=>$nombre,
				':dni'=>$dni,
				':apellido'=>$apellido,
				':email'=>$email,
				':fecha'=>$fecha,
				));
			header('Location: login.php');
		}
		
	}

	require 'views/registrateView.php';

?>