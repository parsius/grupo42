<?php require 'header.php'; ?>
	<div class="contenedor">
		<div class="post">
				<article>
					<h2 class="titulo">Nuevo viaje</h2>
					<form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
						<input type="text" name="titulo" placeholder="Titulo del viaje">
						<h2>Fecha del viaje</h2>
						<input type="date" name="fecha" placeholder="Fecha del viaje">

				<!--		<textarea name="texto" placeholder="Texto del articulo"></textarea> -->
						<select>
							<option value="diario">Viaje Casual</option>
							<option value="diario">Viaje Diario</option>
							<option value="semanal">Viaje Semanal</option>
						</select>
					<!-- 	<input type="file" name="thumb">
					-->
						<input type="submit" value="Publicar viaje ">
						
					</form>	
				</article>
		</div>
	</div>	
<?php require 'footer.php'; ?>