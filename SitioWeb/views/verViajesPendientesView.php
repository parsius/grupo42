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
					<?php 
					  $idpost=$post['idviaje'];
                      $sentencia=$conexion->prepare("SELECT * FROM viajes WHERE id = '$idpost' ");
					  $sentencia->execute();
					  $result= $sentencia->fetchAll();
					  foreach($result as $row){
                     	 $destino= $row['destino'];
                     	 $hora=$row['hora'];
                     	 $fecha=$row['fecha'];
                     	 $fechallegada=$row['fechallegada'];
                     	 $user=$row['idusuario2'];
                     	 $estado=$row['estado'];

                  	  }
                  	if($estado == 2){
					if($post['aceptado']==0){?>
					<h2>Viaje con destino a:</h2>
					<h2 class="titulo"><?php echo $destino; ?></h2>
					<h2>Hora del viaje:</h2>
					<h2 class="titulo"><?php echo $hora; ?></h2>
					<h2>Fecha de salida:</h2>
					<h2 class="titulo"><?php echo $fecha; ?></h2>
					<h2>Fecha de llegada:</h2>
					<h2 class="titulo"><?php echo $fechallegada; ?></h2>
					<h2>Del usuario:</h2>
					<h2 class="titulo"><?php echo $user; ?></h2>
					<h2>Aceptado</h2>
					<?php }else{?>
					<h2>Viaje con destino a:</h2>
					<h2 class="titulo"><?php echo $destino; ?></h2>
					<h2>Hora del viaje:</h2>
					<h2 class="titulo"><?php echo $hora; ?></h2>
					<h2>Fecha de salida:</h2>
					<h2 class="titulo"><?php echo $fecha; ?></h2>
					<h2>Fecha de llegada:</h2>
					<h2 class="titulo"><?php echo $fechallegada; ?></h2>
					<h2>Del usuario:</h2>
					<h2 class="titulo"><?php echo $user; ?></h2>
					<h2>Pendiente</h2>
					<?php }  ?>
					<a href="eliminarmeComoCopiloto.php?id=<?php echo $post['idviaje'];?>&idpost=<?php echo $post['idpostulante'];?>">Eliminarme como copiloto de este viaje</a>
					<?php }else{ ?>
					<h2>Viaje con destino a:</h2>
					<h2 class="titulo"><?php echo $destino; ?></h2>
					<h2>Hora del viaje:</h2>
					<h2 class="titulo"><?php echo $hora; ?></h2>
					<h2>Fecha de salida:</h2>
					<h2 class="titulo"><?php echo $fecha; ?></h2>
					<h2>Fecha de llegada:</h2>
					<h2 class="titulo"><?php echo $fechallegada; ?></h2>
					<h2>Del usuario:</h2>
					<h2 class="titulo"><?php echo $user; ?></h2>
					<h2>Viaje Finalizado</h2>
					<?php } ?>

			<!--		<a href="borrarVehiculo.php?id=<?php echo $post['dominio']; ?>">Borrar</a> !-->
				</article>
				</div>

			<?php endforeach; ?>
			
			<?php require 'paginacionParaMisViajes.php'?>
		</div>
<?php require 'footer.php';?>