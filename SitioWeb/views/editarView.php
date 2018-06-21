<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no,
		initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo RUTA ?>/css/estilos.css">
		<title>Aventon</title>
	</head>
	<body>
		<header>
			<div class="contenedor">
				<div class="logo izquierda">
					<p><a href="<?php echo RUTA ;?>">Aventon</a></p>
				</div>
				<img  src="imagenes/Logo.jpg" alt="" title"imagen abc" width="100px" height="100px"/>
				<div class="derecha">
					<form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get">
					<input type="text" name="busqueda" placeholder="Buscar"> 
					<button type="submit" class="icono fa fa-search"></button>	
					</form>

					<nav class="menu">
						<ul>
									<li><a href="#">Contacto <i class="fa fa-envelope"></i></a></li>
									<li><a href="../SitioWeb/admin/cerrar.php">Cerrrar session</a></li>
									<li><a href="#">Ver perfil</a></li>
									<li><a href="../login_registro/crearVehiculo.php">Crear vehiculo</a></li>
									<li><a href="../SitioWeb/publicarViaje.php">Publicar viaje</a></li>
									<li><a href="../SitioWeb/borrarVehiculo.php">Borrar vehiculo</a></li>
									<li><a href="../SitioWeb/admin/index.php">Listar vehiculos</a></li>
									<li><a href="../SitioWeb/listarMisViajes.php">Listar mis viajes</a></li>
									<li><?php echo $_SESSION['usuario']?></li>
								
								
						</ul>
					</nav>
				</div>
			</div>
		</header>
	<div class="contenedor">
		<div class="post">
				<article>
					<h2 class="titulo">Capcidad</h2>
					<form class="formulario" method="post" enctype="multipart/form-data" 
						action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						<input type="text" name="capacidad" value="<?php echo $post['capacidad']; ?>">
						<h2 class="titulo">Tipo</h2>
						<input type="text" name="tipo" value="<?php echo $post['tipo']; ?>">
						<h2 class="titulo">Modelo</h2>
						<input type="text" name="modelo" value="<?php echo $post['modelo']; ?>">
						<input type="hidden" name="dominio" value="<?php echo $post['dominio']; ?>">
						<input type="submit" value="Modificar viaje">
					</form>	
				</article>
		</div>
	</div>	
<?php require 'footer.php'; ?>