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
    <title>Lista de Medicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-left: -12px;
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
            margin-top: -23px;
            text-align: center;
        }

        .btn-btn-success{
            margin-left:70px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text">Medicos Registrados</h1>
    <br>
    <div class="text-center">
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="../index.php">
                <input type="submit" value="Regresar" class="btn btn-secondary"/>
            </form>
        </div>
        <div class="col-md-6">
            <a href="create_medico.php" class="btn btn-success"><i class="fas fa-user-plus"></i>Crear Medico</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Tipo de Documento</th>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Tipo de Usuario</th>
                <th>Estado</th>
                <th>Especialización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $consulta = "SELECT * FROM medicos, roles, estados, especializacion, t_documento
            WHERE medicos.id_rol = roles.id_rol AND medicos.id_estado = estados.id_estado AND medicos.id_esp = especializacion.id_esp AND medicos.id_doc = t_documento.id_doc";
            $resultado = $con->query($consulta);

            while ($fila = $resultado->fetch()) {
                echo '
                <tr>
                    <td>' . $fila["tipo"] . '</td>
                    <td>' . $fila["docu_medico"] . '</td>
                    <td>' . $fila["nombre_comple"] . '</td>
                    <td>' . $fila["correo"] . '</td>
                    <td>' . $fila["telefono"] . '</td>
                    <td>' . $fila["rol"] . '</td>
                    <td>' . $fila["estado"] . '</td>
                    <td>' . $fila["especializacion"] . '</td>
                    <td>
                        <div class="text-center">
                            <a href="update_medico.php?id=' . $fila['docu_medico'] . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="delete_medico.php?id=' . $fila['docu_medico'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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