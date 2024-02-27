<?php

   require_once ("../../../db/connection.php");
   $db = new Database();
   $con = $db ->conectar();
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for=""><a href="createlicense.php">Crear Licencia</a></label>
    <label for=""><a href="regempresa.php">Crear empresa</a></label>
</body>
</html>