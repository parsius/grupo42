
<?php require 'header.php' ?>

<?php 
try{
		$conexion=new PDO('mysql:host=localhost;dbname=aventon','root','');
	}catch (PDOExeption $e){
		echo "Error:" . $e->getMessage();
    ?>
<?php
# CONECTAMOS CON LA BASE

# EXTRAEMOS DATOS DE MYSQL
$id = 1;
if(!isset($id))
{
echo 'No se ha seleccionado ninguna ID'; 
}else{
# EXTRAEMOS DATOS
$user=mysql_query("SELECT nusuario, email FROM usuarios WHERE id='$id' ");
if($row=mysql_fetch_array($user) )
{
 ?>
<li>Modelo:<?php echo $row['nusuario'];?> </li>
<li>Marca: <?php echo $row['email'];?></li>;<?php
}else{
echo 'No existe el usuario que buscas';
}
 
} 

?>
