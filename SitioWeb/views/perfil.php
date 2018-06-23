
    <?php 
        include 'header.php'
        
        ?>
    
    <div>
    <fieldset>
        <legend> Datos del perfil: </legend>
        <div>
        <?php
            $id= $_GET['ficha'];
            include("perfilView.php");
            $Con = new perfil();
            $Con->recuperarDatos($id);
            ?>
        <li><a href="editarPerfilView.php?ficha=<?php echo $_SESSION['usuario']?>">EDITAR</a></li>
        </div>
        </fieldset>
    </div>
    
   


<?php 
        include 'footer.php'
        
        ?>

