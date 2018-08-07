<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$correo = $_POST['correo'];
	$pregunta = $_POST['pregunta'];
	$errores='';
	$conexion = new PDO('mysql:host=localhost;dbname=aventon', 'root', '');
	$statement=$conexion->prepare("SELECT * FROM usuario WHERE email = '$correo' AND preguntaseguridad = '$pregunta' ");
	$statement->execute();
	$result = $statement->fetch();
	if($result == true){

	}else{
		$errores='<li>Respuesta incorrecta</li>';
	}

require 'views/recuperarPassword.php';

?>