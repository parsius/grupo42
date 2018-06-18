<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: ../SitioWeb/index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
//	$password = hash('sha512', $password);

	try {
		$conexion = new PDO('mysql:host=localhost;dbname=aventon', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();;
	}

	$statement = $conexion->prepare('
		SELECT * FROM usuario WHERE usuario = :usuario AND pass = :password'
	);
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $usuario;
		header('Location: ../SitioWeb/index.php');
	} else {
		$errores .= '<li>Datos Incorrectos</li>';
	}
}

require 'views/loginView.php';

?>