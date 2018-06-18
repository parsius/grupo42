<html>
    <head>
    <?php 
        include 'header.php'
        
        ?>
    </head>
<body>
    <div>
    <fieldset>
        <legend> Datos del perfil: </legend>
        <div>
        <?php
            include("perfilView.php");
            $Con = new perfil();
            $Con->recuperarDatos();
            ?>
        
        </div>
        </fieldset>
    </div>
    
    </body>


<?php 
        include 'footer.php'
        
        ?>

</html>