<?php require 'header.php'; ?>
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