<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta nae="viewport" content="width=device-width, user-scalable=no, 
		initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type='text/css'> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../SitioWeb/css/estiloRegistro2.css">
		<title>Verificar tarjeta</title>
	</head>
	<body>
		<div class="contenedor">
			<h1 class="titulo">Ingrese los datos de su tarjeta de credito</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<h2>El viaje solo se le cobrara si usted es aceptado y el viaje fue finalizado</h2>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="usuario" placeholder="Nombre y apellido del titular">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="tipo" class="usuario" placeholder="Tipo de tarjeta (ej: visa,master,ect)">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="integer" name="ntarjeta" class="usuario" placeholder="Numero de la tarjeta">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="number" name="codigo" class="usuario" placeholder="Codigo de la tarjeta">
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