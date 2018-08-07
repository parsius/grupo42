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
			<h1 class="titulo">Editar vehiculo</h1>
			<hr class="border">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
				<div class="form-group">
					<h2>Elija la patente del vehiculo a editar: </h2>
					<select name="dominio" method="post">
							<?php 
							$usuario=$_SESSION['usuario'];
							$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
							$sql = $conexion->prepare('SELECT * FROM vehiculos WHERE idusuario3 = :idusuario3');
	    					$sql->execute(array('idusuario3' => $usuario));
	   		    			$resultado = $sql->fetchAll(); 
	    					foreach ($resultado as $row) {?>
	    						<option><?php echo $patente=$row['dominio']; ?></option>
	    					<?php }	
	    					
	    					$sql = $conexion->prepare('SELECT * FROM vehiculos WHERE dominio = :patente');
	    					$sql->execute(array('patente' => $patente));
	   		    			$resultado = $sql->fetchAll(); 
	   		    			foreach($resultado as $fila){
	   		    				$tip=$fila['tipo'];
	   		    			}
	   		    		//	$variable = $_POST['dominio'];
	    					?>
						
					</select>
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="tipo" class="usuario" value="<?php echo $tip
	    						?>">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="capacidad" class="usuario" value="<?php 
							$sql = $conexion->prepare('SELECT * FROM vehiculos WHERE dominio = :dom');
	    					$sql->execute(array('dom' => $patente));
	   		    			$resultado = $sql->fetchAll(); 
	    					foreach ($resultado as $row) {
	    						echo $cap=$row['capacidad']; 
	    					}	 
	    						?>">
				</div>
				<div class="form-group">
					<i class="icono izquierda fa fa-user"></i><input type="text" name="modelo" class="usuario" value="<?php 
							$sql = $conexion->prepare('SELECT * FROM vehiculos WHERE dominio = :dom');
	    					$sql->execute(array('dom' => $patente));
	   		    			$resultado = $sql->fetchAll(); 
	    					foreach ($resultado as $row) {
	    						echo $mod=$row['modelo']; 
	    					}	 
	    						?>">
				</div>
				<div class="form-group">
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