
<?php   
class perfil{
    function recuperarDatos($id){
        $con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM usuario WHERE usuario = '$id'";
        $resultado = mysqli_query($con, $query);
      
        ?>

        <table> 
            <?php
        while ($rs = mysqli_fetch_array($resultado)){
            echo "<tr>" 
           ."<tr>"."<td>"."USUARIO: ".$rs['usuario']."</td>"."</tr>" 
           ."<tr>"."<td>"."NOMBRE: ".$rs['nombre']."</td>"."</tr>" 
           ."<tr>"."<td>"."APELLIDO: ".$rs['apellido']."</td>"."</tr>" 
           ."<tr>"."<td>"."CUMPLEAÑOS: ".$rs['fecha']."</td>"."</tr>" 
           ."<tr>"."<td>"."EMAIL: ".$rs['email']."</td>"."</tr>" 
           ."</tr>"; 
            }
        ?>
    </table>
    <?php    
        
        
    }
    function soloRecuperarDatos($id,&$rs){
        $con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM usuario WHERE usuario = '$id'";
        $resultado = mysqli_query($con, $query);
        $rs = mysqli_fetch_array($resultado);
    
    }
     function soloRecuperarMensajes($id,&$rs){
        $con = mysqli_connect("localhost", "root", "", "aventon") or die ("no se pudo conectar");
        mysqli_select_db($con, 'aventon');
        $query = "SELECT * FROM mensajes WHERE idusuario = '$id'";
        $resultado = mysqli_query($con, $query);
        $rs = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        
    }   
}
?>