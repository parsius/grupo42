<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta nae="viewport" content="width=device-width, user-scalable=no, 
		initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type='text/css'> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../SitioWeb/css/estiloRegistro2.css">
		<title>Contacto</title>
	</head>
	<body>
		<div class="contenedor">
			<h1 class="titulo">Si tienes alguna duda contactanos al siguente email</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input disabled type="text" name="origen" class="usuario" value="SoTeEs.solutions@hotmail.com">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="fecha" class="password_btn" 
					placeholder="Introdusca su consulta aqui ">
					<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
				</div>
			</form>	
			<p class="text-registrate">
				<a href="index.php">Volver</a>
		</div>
		
	</body>
</html>