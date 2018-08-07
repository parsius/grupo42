<?php 
require '../SitioWeb/functions.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$correo = $_POST['correo'];
	$pregunta = $_POST['pregunta'];
	$usuario=$_POST['usuario'];
	$errores='';
	$conexion = new PDO('mysql:host=localhost;dbname=aventon', 'root', '');
	$statement=$conexion->prepare("SELECT * FROM usuario WHERE usuario = '$usuario' AND preguntaseguridad = '$pregunta' ");
	$statement->execute();
	$result = $statement->fetch();
	$password="123456";
	if($result == true){
			$contenido="Email: $correo
			Contraseña: $password";
			

			$archivo=fopen("$correo.txt", "w");
			fwrite($archivo, $contenido);
			header('Location: login.php');
	}else{
		$errores='<li>Respuesta incorrecta</li>';
	}
}

require 'views/recuperarPasswordView.php';

?>