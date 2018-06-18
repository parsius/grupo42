<?php require 'header.php' ?>
		<div class="contenedor">
			<?php foreach ($posts as $post): ?>
				<div class="post">
				<article>
					<h2 class="titulo"><h2>Usuario: </h2><?php echo $post['idusuario2']; ?></h2>
						<p class="fecha"><h2>Lugar de partida: </h2><?php echo $post['origen']; ?></p>
						<p class="extracto"><h2>Destino del viaje: </h2><?php echo $post['destino']; ?></p>
						<a href="javascript:;" onclick="document.getElementById(<?php echo $post['id']?>).style.display='block';">Ver detalle</a>
						<div id="<?php echo $post['id']?>" style="display:none">
						<p class="fecha"><h2>Fecha de salida: </h2><?php echo fecha($post['fecha']); ?></p>
						<p class="fecha"><h2>Horario de salida: </h2><?php echo $post['hora']; ?></p>
						<p class="extracto"><h2>Tipo de viaje: </h2><?php echo $post['tipo']; ?></p>
						</div>
						


		<!--				<a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Comentarios</a> -->
				</article>
				</div>

			<?php endforeach; ?>
			
			<?php require 'paginacion.php'?>
		</div>
<?php require 'footer.php';?>