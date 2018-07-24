<?php require 'header.php' ?>
		<div class="contenedor">
			<?php foreach ($posts as $post): ?>
				<div class="post">
				<article>
					<h2 class="titulo"><h2>Usuario: </h2><?php echo $post['idusuario2']; ?></h2>
						<p class="fecha"><h2>Lugar de partida: </h2><?php echo $post['origen']; ?></p>
						<p class="extracto"><h2>Destino del viaje: </h2><?php echo $post['destino']; ?></p>
						<p class="fecha"><h2>Fecha de salida: </h2><?php echo fecha($post['fecha']); ?></p>
						<p class="fecha"><h2>Fecha de llegada: </h2><?php echo fecha($post['fechallegada']); ?></p>
						<p class="extracto"><h2>Precio: </h2><?php echo "$". $post['precio']; ?></p>
						<a href="javascript:;" onclick="document.getElementById(<?php echo $post['id']?>).style.display='block';">Ver detalle</a>
						<div id="<?php echo $post['id']?>" style="display:none" >
							<p class="fecha"><h2>Horario de salida: </h2><?php echo $post['hora']; ?></p>
							<p class="extracto"><h2>Tipo de viaje: </h2><?php echo $post['tipo']; ?></p>
							<p class="extracto"><h2>Capacidad del viaje: </h2><?php echo $post['capacidad']; ?></p>
							
							<?php
								if (isset($_SESSION['usuario'])) { ?>
									<a href="postularse.php?id=<?php echo $post['id']?>&user=<?php echo $post['idusuario2']?>;" method="post" type="submit">Postularse al viaje</a>
									<?php } ?>
						</div>
						
	<!--				<a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Comentarios</a> -->
				</article>
				</div>

			<?php endforeach; ?>
			<?php require 'paginacion.php'?>
		</div>
<?php require 'footer.php';?>