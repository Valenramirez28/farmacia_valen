<?php
    require_once("../../../db/connection.php");
    $db = new Database();
    $con = $db->conectar();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Desarrollador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .options {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }
        .options button {
            border: none;
            background-color: #3fbbc0;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 8px;
        }
        .options button:hover {
            background-color: #3fbbc0;
        }
        .options button i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido Desarrollador</h1>
        <div class="options">
            <button><a href="licencia/index_li.php"><i class="fas fa-building"></i> Licencia</a></button>
            <button><a href="empresa/index_emp.php"><i class="fas fa-building"></i> Empresa</a></button>
        </div>
    </div>
</body>
</html>
