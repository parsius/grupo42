<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no,
		initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../SitioWeb/css/estilos.css">
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
							<?php
								
								session_start(); 
								if (isset($_SESSION['usuario'])) {
									?>
									<li><a href="../SitioWeb/contacto.php">Contacto <i class="fa fa-envelope"></i></a></li>
									<li><a href="../SitioWeb/admin/cerrar.php">Cerrar sesion</a></li>
									<li><a href="../SitioWeb/views/perfil.php?ficha=<?php echo $_SESSION['usuario'];?>">Ver perfil</a></li>
									<li><a href="../login_registro/crearVehiculo.php">Crear vehiculo</a></li>
									<li><a href="../SitioWeb/sinVehiculoPublicarViaje.php">Publicar viaje</a></li>
									<li><a href="../SitioWeb/admin/index.php">Listar vehiculos</a></li>
									<li><a href="../SitioWeb/listarMisViajes.php">Listar mis viajes</a></li>
									<li><a href="../SitioWeb/verViajesPendientes.php">Viajes pendientes/aprobados</a></li>
									<li><a href="../SitioWeb/misMensajes.php?ficha=<?php echo $_SESSION['usuario'];?>">Mensajes</a></li>
									<li><a href="../SitioWeb/ayuda.php">Ayuda</a></li>
									<li><?php echo $_SESSION['usuario']?></li>
								<?php
								}else{?>
								<li><a href="#">Contacto <i class="fa fa-envelope"></i></a></li>
								<li><a href="../login_registro/login.php">Iniciar Sesion</a></li>
								<li><a href="../login_registro/registrate.php">Registrarse</a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		

<h1>Menu De yuda</h1>
<p></p>
<h2>Contacto:</h2p>
<h1>En esta pestaña usted podra consultar directamente con nosotros sobre algun problema o inconveniente secedido.</h1>
<p></p>
<p></p>
<p></p>
<h2>Cerrar Cesion</h2>
<h4>Con cerrar cession usted podra desloguearse de la pagina</h4>
<p></p>
<p></p>
<p></p>
<h2>Ver Perfi</h2>
<h4>Con ver perfil podra consultar su perfil, modificarlo o borrar su cuenta si lo desea.</h4>
<p></p>
<p></p>
<p></p>
<h2>Crear Vehiculo</h2>
<h4>Con esta opcion usted ira a una plantilla donde creara el vehculo para su viaje, es necesario al menos un vehiculo para que usted pueda publicar un viaje</h4>
<p></p>
<p></p>
<p></p>
<h2>Publicar Viaje</h2>
<h4>Con esta opcion usted publicara viajes a los cuales se le sumara usuarios. Recuerde que para esto necesita un auto creado y dar una tarjeta de credito como forma de pago, el cual solo se descontar si se da por finalizado el viaje</h44>
<p></p>
<p></p>
<p></p>
<h2>Listar Vehiculos</h2>
<h4>Listara los vehiculos registrados a su nombre.</h4>
<p></p>
<p></p>
<p></p>
<h2>Listar Mis Viajes</h2>
<h4>Listara los viajes que usted a publicado, para tener un control de los postulantes.</h4>
<p></p>
<p></p>
<p></p>
<h2>Viajes Pendientes/aprobados</h2>
<h4>Lista los viajes a los que usted se postulo, es donde sabra si fue aceptado o rechazado de un viaje</h4>
<p></p>
<p></p>
<p></p>
<h2>Mensajes</h2>
<h4>Mustra los mensajes con respecto a los cambios en un viaje, le dira si usted fue acpetado, rechazado y los cobros de la tarjeta a viajes finalizados.</h4>







<?php require '../SitioWeb/views/footer.php';?>