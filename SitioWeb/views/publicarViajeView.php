<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta nae="viewport" content="width=device-width, user-scalable=no, 
		initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type='text/css'> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estiloRegistro2.css">
		<title>Registrate</title>
	</head>
	<body>
		<div class="contenedor">
			<h1 class="titulo">Publicar viaje</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="origen" class="usuario" placeholder="Origen de salida">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="time" name="hora" class="usuario" placeholder="hora de salida">
				</div>
				<div class="form-group">
					<h2>Tipo de viaje</h2>
					<select name="tipo" >
						<option value="casual">Casual</option>
						<option value="diario">Diario</option>
						<option value="semanal">Semanal</option>
					</select>
				</div>
				<div class="form-group">
					<h2>Introdusca la patente del vehiculo a utilizar: </h2>
					<select name="dominio" >
							<?php 
							$usuario=$_SESSION['usuario'];
							$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
							$sql = $conexion->prepare('SELECT * FROM vehiculos WHERE idusuario3 = :idusuario3');
	    					$sql->execute(array('idusuario3' => $usuario));
	   		    			$resultado = $sql->fetchAll(); 
	    					foreach ($resultado as $row) {?>
	    						<option ><?php echo $patente=$row['dominio']; ?></option>
	    					<?php }	?>
						
					</select>
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="destino" class="usuario" placeholder="Destino del viaje">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="date" name="fecha" class="password_btn" 
					placeholder="Fecha del viaje">
					<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
				</div>
				<?php if(!empty($errores)):?>
					<div class="error">
						<ul>
							<?php  echo $errores;?>
						</ul>
					</div>
				<?php endif;?>
			</form>
			<p class="text-registrate">
				<a href="index.php">Volver</a>
		</div>
		
	</body>
</html>