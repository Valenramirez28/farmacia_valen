<?php
    require_once("../../../../db/connection.php"); 
    $conexion = new Database();
    $con = $conexion->conectar();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tipos de Medicamentos</title>
    <!-- Agregar enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-left: 1px;
            margin-right: -70px;
            margin-top: 40px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }
        thead {
            background-color: #007bff;
            color: white;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #e2e2e2;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-container .btn {
            width: 48%;
        }
        .text{
            margin-top: 10px;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text">Tipos de Medicamentos</h1>
    <br>
    <div class="text-center">
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="../index.php">
                <input type="submit" value="Regresar" class="btn btn-secondary"/>
            </form>
        </div>
        <div class="col-md-6">
            <a href="create_tip_medicam.php" class="btn btn-success">Crear Tipo de Medicamento</a>
        </div>
    </div>
</div>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>id_cla</th>
                <th>Tipo de Medicamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $consulta = "SELECT * FROM tipo_medicamento";
            $resultado = $con->query($consulta);

            while ($fila = $resultado->fetch()) {
                echo '
                <tr>
                    <td>' . $fila["id_cla"] . '</td>
                    <td>' . $fila["clasificacion"] . '</td>
                    <td>
                        <div class="text-center">
                            <a href="update_tip_medicam.php?id=' . $fila["id_cla"] . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="delete_tip_medicam.php?id=' . $fila["id_cla"] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>