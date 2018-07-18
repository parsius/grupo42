<?php require 'header.php' ?>
		<div class="contenedor">
			<h2><?php echo $titulo; ?></h2>
			<?php foreach ($resultados as $post): ?>
				<div class="post">
				<article>
					<h2 class="titulo"><a href="index.php?id=<?php echo $post['id']; ?>"><?php echo $post['destino']; ?></a></h2>
					<p class="fecha"><?php echo fecha($post['fecha']); ?></p>
					<p class="fecha"><?php echo $post['hora']; ?></p>
					<p class="fecha"><?php echo $post['idusuario2']; ?></p>
					<p class="fecha"><?php echo $post['precio']; ?></p>
					<a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Comentarios</a>
				</article>
				</div>

			<?php endforeach; ?>
			
			<?php require 'paginacion.php'?>
		</div>
<?php require 'footer.php';?>