
    <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no,
		initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/estilos.css">
		<title>Aventon</title>
	</head>
	<body>
		<header>
			<?php
            $id= $_GET['ficha'];
           
            ?>
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
									<li><?php echo $id; ?></li>
								
								
						</ul>
					</nav>
				</div>
			</div>
		</header>
    
    <div>
   
        <legend> Datos del perfil: </legend>
        <div class="contenedor">
        <div class="post">
        <article>
        <?php
            $id= $_GET['ficha'];
            include("perfilView.php");
            $Con = new perfil();
            $Con->recuperarDatos($id);
            ?>
        <li><a href="editarPerfilView.php?ficha=<?php echo $id; ?>">EDITAR</a></li>
         <li><a href="../borrarCuenta.php?user=<?php echo $id; ?>">Borrar cuenta</a></li>
            </div>
            </div>
            </article>
        
    </div>
    
   


<?php 
        require 'footer.php'
        
        ?>

