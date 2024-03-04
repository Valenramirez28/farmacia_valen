<?php
    require_once("../../db/connection.php"); 
    $db = new Database();
    $con = $db->conectar();
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Seccion</title>
    

</head>
<body>
  
        
</div>


    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="POST" name="form1" id="form1" action="../../controller/validacion.php" autocomplete="off" class="login">
                   
                    <div class="login__field">
                        <h3>Ingrese el codigo de seguridad</h3>
                        <i class="login__icon fas fa-lock"></i>
                        <input type="number" class="login__input" name="codigo" placeholder="Ingrese el codigo unico de la empresa">
                    </div>
                    <!-- <button class="button login__submit"> -->
                        <input type="submit" name="inicio"  class="button login__submit"  value="iniciar Seccion">
                 
                    
                </form>
                
             </div>

    
</body>
</html>