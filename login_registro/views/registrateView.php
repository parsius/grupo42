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
			<h1 class="titulo">Registrate</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="usuario" placeholder="Nombre">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="apellido" class="usuario" placeholder="Apellido">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="date" name="fecha" class="usuario" placeholder="Fecha de nacimiento">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="number" name="dni" class="usuario" placeholder="DNI">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="email" name="email" class="usuario" placeholder="Email">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-lock"></i><input minlength="6" maxlength="10" type="password" name="password" class="password" placeholder="Contraseña">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-lock"></i><input minlength="6" maxlength="10" type="password" name="password2" class="password_btn" 
					placeholder="Repetir contraseña">
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
				¿ Ya tienes cuenta?
				<a href="../login_registro/login.php">Iniciar Sesion</a>
		</div>
		
	</body>
</html>