
	<?php require '../views/header.php'; ?>
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
					<h2>tipo:</h2>
					<h2 class="titulo"><?php echo $post['tipo']; ?></h2>
					<h2>Capacidad:</h2>
					<h2 class="titulo"><?php echo $post['capacidad']; ?></h2>
					<h2>Modelo:</h2>
					<h2 class="titulo"><?php echo $post['modelo']; ?></h2>
					<a href="editar.php?id=<?php echo $post['dominio']; ?>">Editar</a>
				</article>
				</div>

			<?php endforeach; ?>
			
			<?php require '../paginacion.php'?>
		</div>
<?php require '../views/footer.php';?>

