<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta nae="viewport" content="width=device-width, user-scalable=no, 
		initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type='text/css'> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../SitioWeb/css/estiloRegistro2.css">
		<title>Crear vehiculo</title>
	</head>
	<body>
		<div class="contenedor">
			<h1 class="titulo">Crear Vehiculo</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="dominio" class="usuario" placeholder="Dominio">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="tipo" class="usuario" placeholder="Tipo">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="capacidad" class="usuario" placeholder="Capacidad">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-lock"></i><input type="text" name="modelo" class="password_btn" 
					placeholder="Modelo">
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
				<a href="../SitioWeb/index.php">Volver</a>
		</div>
		
	</body>
</html>