<form method="post" action="bajaVehiculo.php">
			<td><input type="hidden" name="idVeh" value="<?php echo $row['idVehiculo']?>"></td>
			<td><input type="submit" value="Baja"></td>
			</form> 
<?php
	
	session_start();
	$au=new usuario();
	
		?>
		
		<?php
		die;
	}
	if ((isset($_POST['idVeh']))&&(!empty($_POST['idVeh']))) {
		$con=new PDO('mysql:host=localhost;dbname=sitioweb','root','');
	}catch (PDOExeption $e){
		echo "Error:" . $e->getMessage();
    
		$res=mysqli_query($con,"DELETE FROM autos WHERE id=".$_POST['idVeh']);
		if(!$res){
			echo "No se pudo eliminar";
			?>
			
			<?php
			
		
			echo "Vehiculo eliminado!";
			?>
				
			
			
		
		<?php
	}
?>