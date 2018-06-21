<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta nae="viewport" content="width=device-width, user-scalable=no, 
		initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type='text/css'> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../SitioWeb/css/estiloRegistro2.css">
		<title>Registrate</title>
	</head>
	<body>
		<div class="contenedor">
			<h1 class="titulo">Postularse a un viaje</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="integer" name="idviaje" class="usuario" value="<?php echo htmlspecialchars($_GET['id'])?>">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="idpiloto" class="usuario" value="<?php 
					$id=$_GET['id'];
					$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
					$conect = $conexion->prepare('SELECT * FROM viajes WHERE id = :id');
					$conect->execute(array('id' => $id));
  		    		$result = $conect->fetchAll();
	   		   		foreach ($result as $r) {
	    				$user=$r['idusuario2'];
	    			} echo $user;?>">
				</div>
				<div class="form-group">
					<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
				</div>
				<?php if(!empty($errores)):?>
					<div class="error">
						<ul>
							<?php  echo $errores;?>
						</ul>
					</div>
				<?php endif;?>
			</form>
			<p class="text-registrate">
				<a href="index.php">Volver</a>
		</div>
		
	</body>
</html>