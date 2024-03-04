<?php

   require_once ("db/connection.php");
   $db = new Database();
   $con = $db ->conectar();
   session_start();

   if (isset($_POST['actualizar'])){ 
        $documento= $_SESSION['user_id'];
        $contrasena= $_POST['contrasena']; 
        $confirmar_contrasena= $_POST['confirmar_contrasena'];
        
        if($contrasena == $confirmar_contrasena) {
            $sql= $con -> prepare ("SELECT * FROM usuarios");
            $sql -> execute();
            $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);
            
            if ($contrasena=="" || $confirmar_contrasena=="")
                {
                echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
                echo '<script>window.location="registro_empleados.php"</script>';
                }
        
                else{
                $consulta = $con->prepare("SELECT * FROM usuarios WHERE documento = '$documento'");
                $consulta -> execute();
                $consul = $consulta -> fetchAll(PDO::FETCH_ASSOC);
        
                
        
        
                $pass_cifrado = password_hash($contrasena,PASSWORD_DEFAULT, array("pass"=>12));
        
                $insertSQL = $con->prepare("UPDATE usuarios SET password='$pass_cifrado' WHERE documento = '$documento' ");
                $insertSQL -> execute();
                echo '<script> alert("REGISTRO EXITOSO");</script>';
                echo '<script>window.location="login.html"</script>';
                unset($_SESSION['user_id']);
            }  
        }
        else {
            echo '<script>alert ("LAS CONTRASEÑAS NO COINCIDEN");</script>';
        }
        
    }
  
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulario de Cambio de Contraseña</title>
<link rel="stylesheet" href="assets/css/contrasena.css">
</head>
<body>
<div class="container">
  <h2>Cambio de Contraseña</h2>
  <form method="post" name="form1" id="form1"  autocomplete="on"> 
    <div class="form-group">
      <label for="contrasena">Nueva Contraseña:</label>
      <input type="password" id="contrasena" name="contrasena" required>
    </div>

    <div class="form-group">
      <label for="confirmar_contrasena">Confirmar Contraseña:</label>
      <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
    </div>
    
    <input type="submit" name="actualizar" value="actualizar">
      <input type="hidden" name="MM_insert" value="formreg">
    
    <div id="mensaje_error" class="mensaje-error"></div>
  </form>
</div>
<script>
document.querySelector("form").onsubmit = function() {
  var nuevaContraseña = document.getElementById("nueva_contraseña").value;
  var confirmarContraseña = document.getElementById("confirmar_contraseña").value;
  if (nuevaContraseña !== confirmarContraseña) {
    document.getElementById("mensaje_error").innerHTML = "Las contraseñas no coinciden";
    return false; // Detiene el envío del formulario si las contraseñas no coinciden
  }
};
</script>
</body>
</html>
