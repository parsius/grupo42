<?php require 'header.php' ?>
		<div class="contenedor">
			<?php foreach ($posts as $post): ?>
				<div class="post">
				<article>
					<h2 class="titulo"><h2>Usuario: </h2><?php echo $post['idusuario3']; ?></h2>
						<p class="fecha"><h2>Dominio: </h2><?php echo $post['dominio']; ?></p>
						<p class="fecha"><h2>Tipo: </h2><?php echo $post['tipo']; ?></p>
						<p class="fecha"><h2>Capacidad: </h2><?php echo $post['capacidad']; ?></p>
						<div class="thumb">
							<a href="single.php?id=<?php echo $post['id']; ?>">
					<!--			<img src="<?php echo RUTA; ?>/imagenes/<?php echo $post['thumb']; ?>" alt=""> -->
							</a>
						</div>
						<p class="extracto"><h2>Modelo: </h2><?php echo $post['modelo']; ?></p>
						<a href="../SitioWeb/editarVehiculo.php">Editar </a>
		<!--				<a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Comentarios</a> -->
				</article>
				</div>

			<?php endforeach; ?>
			
			<?php require 'paginacion.php'?>
		</div>
<?php require 'footer.php';?>