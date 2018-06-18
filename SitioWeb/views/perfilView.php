<?php 
 class perfil{
     function recuperarDatos(){
		$link = mysqli_connect("localhost", "root", "", "aventon");
        // $con =  mysqli_connect('localhost', 'root','') or die ("no se pudo conectar");
	    mysqli_select_db( $link, 'aventon') or die ("no se pudo conectar");
  

$id= 1;
$query="SELECT usuario, email FROM usuarios WHERE id='$id' ";
$resultado = mysqli_query($link, $query);
         
if($row = mysqli_fetch_array($resultado)) {
 
 echo $row['usuario'] ;?>
  <br>  
 
 <?php echo $row['email'] ; 
     

 

 

 }
}
}
?>