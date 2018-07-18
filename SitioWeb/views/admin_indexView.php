
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
									<li><a href="../SitioWeb/admin/index.php">Listar vehiculos</a></li>
									<li><a href="../SitioWeb/listarMisViajes.php">Listar mis viajes</a></li>
									<li><a href="../SitioWeb/verViajesPendientes.php">Viajes pendientes/aprobados</a></li>
									<li><a href="../SitioWeb/misMensajes.php?ficha=<?php echo $_SESSION['usuario'];?>">Mensajes</a></li>

									<li><?php echo $_SESSION['usuario']?></li>
								
								
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<div class="contenedor">
			<h2>
			</h2>	
			<?php foreach ($posts as $post): ?>
				<div class="post">
				<article>
					<h2>Usuario:</h2>
					<h2 class="titulo"><?php echo $post['idusuario3']; ?></h2>
					<h2>Dominio:</h2>
					<h2 class="titulo"><?php echo $post['dominio']; ?></h2>
					<h2>Tipo:</h2>
					<h2 class="titulo"><?php echo $post['tipo']; ?></h2>
					<h2>Capacidad:</h2>
					<h2 class="titulo"><?php echo $post['capacidad']; ?></h2>
					<h2>Modelo:</h2>
					<h2 class="titulo"><?php echo $post['modelo']; ?></h2>
					<?php if($post['enuso'] == 1){ ?>
					<h2 >Este vehiculo esta siendo utilizado en un viaje por lo tanto no se puede dar de baja</h2>
					<?php } ?>
					<a href="editar.php?id=<?php echo $post['dominio']; ?>">Editar</a>
					<?php if($post['enuso'] == 0){ ?>
					<a href="borrarVehiculo.php?dom=<?php echo $post['dominio']; ?>">Borrar vehiculo</a>
					<?php } ?>
					
			<!--		<a href="borrarVehiculo.php?id=<?php echo $post['dominio']; ?>">Borrar</a> !-->
				</article>
				</div>

			<?php endforeach; ?>
			
			<?php require '../paginacion.php'?>
		</div>
<?php require '../views/footer.php';?>

