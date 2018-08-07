<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta nae="viewport" content="width=device-width, user-scalable=no, 
		initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type='text/css'> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../SitioWeb/css/estiloRegistro2.css">
		<title>Iniciar Sesion</title>
	</head>
	<body>
		<div class="contenedor">
			<h1 class="titulo">Iniciar Sesion</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="correo" class="usuario" placeholder="Ingrese un correo para recibir su contraseña">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-lock"></i><input type="text" name="pregunta" class="password_btn" 
					placeholder="¿Como se llama tu mamá?">
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