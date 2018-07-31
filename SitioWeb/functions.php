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
		//Obtengo los viajes que todavia no se hicieron
		$statement=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM viajes WHERE estado = '2' ");
		$statement->execute();
		
		$result= $statement->fetchAll();
		foreach($result as $row){
			//Obtengo la patente, el id y la fecha de llegada del viaje para asi compararla con la de la compu y finalizar el viaje
			$fechaLlegadaViaje=$row['fechallegada'];
			$id=$row['id'];
			$patente=$row['idauto2'];
			$estado=$row['estado'];
			$usuario=$row['idusuario2'];
			$precio=$row['precio'];
			$destino=$row['destino'];
			$capacidad=$row['capacidad'];
			$parapagar=1;
			if($fechaLlegadaViaje <= $fecha_act AND $estado == 2){
				//Actualizo el estado del viaje de 2 a 0 para indicar que este termino porque la fecha de la pc es mayor a la del viaje
				$statement2=$conexion->prepare("UPDATE viajes SET estado = '0' WHERE id = '$id' ");
				$statement2->execute();

				//Atualizo el estado del auto de 2 a 0 para indicar que esta libre para otro viaje
				$statement3=$conexion->prepare("UPDATE vehiculos SET enuso = '0' WHERE dominio = '$patente' ");
				$statement3->execute();

				$st=$conexion->prepare("SELECT * FROM vehiculos WHERE dominio = '$patente' AND idusuario3 = '$usuario'");
				$st->execute();
				$r=$st->fetchAll();

				//Busco la capacidad del vehiculo y le resto la capacidad actual del viaje para que me de la cantidad de integrantes del viaje
				foreach($r as $rw){
					$capacidadVehiculo=$rw['capacidad'];
				}
				//Capaciad total de los que viajaron
				$capacidadActual=($capacidadVehiculo-$capacidad)+1;
				//Precio del viaje dividido la cantidad de integrantes mas el 5% para SO.TE.ES
				$precioDividido=($precio/$capacidadActual)+(($precio*5)/100);

				//Envio de mensaje para pagar el viaje para el piloto
				
        		$mensaje="El viaje con destino a ".$destino." que usted creo finalizo y se le debito el monto de ".$precioDividido." pesos ";
				$conect6= $conexion->prepare('INSERT INTO mensajes(mensaje,idviaje,idusuario,parapagar,precio) VALUES(:mensaje,:idviaje,:idusuario,:parapagar,:precio)');
				$conect6->execute(array(
				':idviaje'=> $id,
				':idusuario'=> $usuario,
				':mensaje'=> $mensaje,
				':parapagar'=>$parapagar,
				':precio'=>$precioDividido));

				////Envio de mensaje para pagar el viaje para los copilotos

       		 	$conect7= $conexion->prepare("SELECT * FROM postulantes WHERE idpiloto = '$usuario' AND idviaje = '$id' ");
        		$conect7->execute();
       	 		$rs= $conect7->fetchAll();
       	 		foreach($rs as $row3){
       	 			$idpostulante=$row3['idpostulante'];
       	 			$aceptado=$row3['aceptado'];
       	 			if($aceptado == 0){
       	 				$mensaje2="El viaje con destino a ".$destino." de ".$usuario." finalizo y se le debito de la tarjeta de credito el monto de ".$precioDividido." pesos";
						$conect6= $conexion->prepare('INSERT INTO mensajes(mensaje,idviaje,idusuario,parapagar,precio) VALUES(:mensaje2,:idviaje,:idpostulante,:parapagar,:precio)');
						$conect6->execute(array(
						':idviaje'=> $id,
						':idpostulante'=> $idpostulante,
						':mensaje2'=> $mensaje2,
						':parapagar'=>$parapagar,
						':precio'=>$precioDividido));
					}
       	 		}
        		
				
			}
		}
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM viajes WHERE estado = '2' AND fechallegada > '$fecha_act' ORDER BY id DESC LIMIT $inicio, $post_por_pagina ");
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function obtener_post_de_mensajes($conexion,$id,$post_por_pagina){
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$sentencia=$conexion->prepare("SELECT * FROM mensajes WHERE idusuario = '$id' ORDER BY idviaje DESC LIMIT $inicio, $post_por_pagina ");
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
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM viajes WHERE idusuario2 = '$id' AND estado = '0' or estado='2' LIMIT $inicio, $post_por_pagina");
		//$sentencia->execute(array('nombre' => $id));
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function obtener_post_de_viajes_finalizados($post_por_pagina,$conexion,$id){
		$inicio= (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina: 0;
		$sentencia=$conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM viajes WHERE idusuario2 = '$id' AND estado = '0' LIMIT $inicio, $post_por_pagina");
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
		$sentencia=$conexion->prepare("SELECT * FROM postulantes WHERE idpostulante = '$id' AND aceptado = '2' OR aceptado='0' LIMIT $inicio, $post_por_pagina");
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

	function limpiar(){
    setTimeout('document.login.reset()',2000);
    return false;
	}
	

function calcular_puntaje($id, $num){
		
		$con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM puntuaciones WHERE idusuario = '$id'";
        $resultado = mysqli_query($con, $query);
        $rs = mysqli_fetch_array($resultado);
       $tot=$rs['puntuado']+$num;
       $cant=$rs['cant']+1;
         
       $con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
         $query = "UPDATE puntuaciones SET puntuado='$tot', cant='$cant' WHERE idusuario = '$id'";
        mysqli_query($con, $query);
        

       

		

}

function calcular_puntaje_cancelado($id, $num){
		
		$con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM puntuaciones WHERE idusuario = '$id'";
        $resultado = mysqli_query($con, $query);
        $rs = mysqli_fetch_array($resultado);
       
        $tot=$rs['puntuado']-2;
        if($tot <= 0){
        	$tot=0;
        }

		$con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
         $query = "UPDATE puntuaciones SET puntuado='$tot' WHERE idusuario = '$id'";
        mysqli_query($con, $query);

}
function consultar_puntaje($id){
		
		$con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM puntuaciones WHERE idusuario = '$id'";
        $resultado = mysqli_query($con, $query);
        $rs = mysqli_fetch_array($resultado);
       
        $tot=$rs['puntuado'];

		return $tot;

}
?>