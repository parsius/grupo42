<?php 
	function conexion(){
		try {
			$conexion=new PDO('mysql:host=localhost;dbname=aventon', 'root','');
			return $conexion;
		}catch (PDOExeption $e){
			return false;
		}
	}

	function limpiarDatos($datos){
		$datos=trim($datos);
		$datos=stripcslashes($datos);
		$datos=htmlspecialchars($datos);
		return $datos;
	}

	function pagina_actual(){
		return isset($_GET['p']) ? (int)$_GET['p'] : 1;
	}

	function obtener_post($post_por_pagina,$conexion){
		$fecha_act =date('Y-m-d',time());
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$statement=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM viajes WHERE estado = '2' ");
		$statement->execute();
		$result= $statement->fetchAll();
		foreach($result as $row){
			$fechaLlegadaViaje=$row['fechallegada'];
			$id=$row['id'];
			if($fechaLlegadaViaje <= $fecha_act){
				$statement2=$conexion->prepare("UPDATE viajes SET estado = '0' WHERE id = '$id' ");
				$statement2->execute();
			}
		}
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM viajes WHERE estado = '2' AND fechallegada > '$fecha_act' ORDER BY id DESC LIMIT $inicio, $post_por_pagina ");
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function obtener_post_de_mensajes($conexion,$id){
		
		$sentencia=$conexion->prepare("SELECT * FROM mensajes WHERE idusuario = '$id' ");
		//$sentencia->execute(array('nombre' => $id));
		$sentencia->execute();
		
        return $sentencia->fetchAll();
        
	}

	function obtener_post_de_vehiculos($post_por_pagina,$conexion,$id){
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$int=0;
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM vehiculos WHERE idusuario3 = '$id' AND valido = '$int' LIMIT $inicio, $post_por_pagina");
		//$sentencia->execute(array('nombre' => $id));
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function obtener_post_de_viajes($post_por_pagina,$conexion,$id){
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM viajes WHERE idusuario2 = '$id' AND estado = '2' LIMIT $inicio, $post_por_pagina");
		//$sentencia->execute(array('nombre' => $id));
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function obtener_post_de_postulantes($post_por_pagina,$conexion,$id){
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM postulantes WHERE idviaje = '$id' AND aceptado = '2' LIMIT $inicio, $post_por_pagina");
		//$sentencia->execute(array('nombre' => $id));
		$sentencia->execute();
		return $sentencia->fetchAll();
	}
	// Ver viajes pendientes o aprobados
	function obtener_post_de_postulantes_poa($post_por_pagina,$conexion,$id){
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM postulantes WHERE idpostulante = '$id' AND aceptado = '2' OR aceptado='0' LIMIT $inicio, $post_por_pagina");
		//$sentencia->execute(array('nombre' => $id));
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function obtener_post_de_postulantes_aceptados($post_por_pagina,$conexion,$id){
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM postulantes WHERE idviaje = '$id' AND aceptado = '0' LIMIT $inicio, $post_por_pagina");
		//$sentencia->execute(array('nombre' => $id));
		$sentencia->execute();
		return $sentencia->fetchAll();
	}


	function id_viaje($id){
		return (int)limpiarDatos($id);
	}

	function obtener_post_por_id($conexion, $id){
		$resultado = $conexion->query("SELECT * FROM viajes WHERE id = $id ");
		$resultado = $resultado->fetchAll();
		return($resultado) ? $resultado : false;
	}

	function listar_vehiculos_por_id($conexion, $id){
		$resultado = $conexion->query("SELECT * FROM vehiculos WHERE dominio = '$id' ");
		$resultado = $resultado->fetchAll();
		return($resultado) ? $resultado : false;
	}
	


	function numero_paginas($post_por_pagina,$conexion){
		$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
		$total_post->execute();
		$total_post = $total_post->fetch()['total'];

		$numero_paginas = ceil($total_post / $post_por_pagina);
		return $numero_paginas;

	}

	function fecha($fecha){
		$timestamp = strtotime($fecha);
		$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
		$dia = date('d', $timestamp);
		$mes = date('m', $timestamp) - 1;
		$year = date('Y', $timestamp);

		$fecha = "$dia de " . $meses[$mes] ." del $year";
		return $fecha;
	}

//	function comprobarSession(){
//		if(!isset($_SESSION['admin'])){
	//		header('Location:' . RUTA);
	//	}
//	}

	function getAge ($fecha)
    {

        $mayor=18;

        //Creamos objeto fecha desde los valores recibidos
        $nacio = DateTime::createFromFormat('Y-m-d', $fecha);

        //Calculamos usando diff y la fecha actual
        $calculo = $nacio->diff(new DateTime());

        //Obtenemos la edad
        $edad=  $calculo->y;    

        if ($edad < $mayor) 
        {
           // echo "Usted es menor de edad. Su edad es: $edad\n";
            return false;  
         }else{
           // echo "Usted es mayor de edad. Su edad es: $edad\n";
            return true;  
        }
    }
    function id_usuario($id){
		return (string)$id;
	}
	
?>