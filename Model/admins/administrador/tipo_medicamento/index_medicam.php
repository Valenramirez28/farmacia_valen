<?php
session_start();
require_once("../../../../db/connection.php"); 
$conexion = new Database();
$con = $conexion->conectar();
?>
    <?php
    if(isset($_GET['btn_buscar'])) {
    $buscar = $_GET['buscar'];

    // Preparar la consulta SQL
    $consulta = $con->prepare("SELECT * FROM tipo_medicamento WHERE clasificacion LIKE :buscar");

    // Asignar valor al parámetro
    $buscar = "%$buscar%";
    
    // Vincular el parámetro
    $consulta->bindParam(':buscar', $buscar, PDO::PARAM_STR);

    // Ejecutar la consulta
    $consulta->execute();

    // Obtener los resultados
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tipos de Laboratorios</title>
    <link rel="stylesheet" href="../../css/tip_usu.css">
</head>
<body>
    <div class="contenedor">
        <h2>TIPOS DE LABORATORIOS</h2>
        <div class="row mt-3">
    <div class="col-md-6">
        <?php if(isset($_GET['btn_buscar'])): ?>
            <form action="index_medicam.php" method="get">
                <input type="submit" value="Regresar" class="btn btn-secondary"/>
            </form>
        <?php else: ?>
            <form action="../index.php">
                <input type="submit" value="Regresar" class="btn btn-secondary"/>
            </form>
        <?php endif; ?>
    </div>
    <div>
        <div class="barra_buscador">
            <form action="" class="formulario" method="GET">
                <input type="text" name="buscar" placeholder="Buscar Tipo de Laboratorio" class="input_text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                <a href="create_tip_medicam.php" class="btn btn_nuevo">Crear Tipo de Laboratorio</a>
            </form>
        </div>
        <table>
            <tr class="head">
                <td>Nombre del Laboratorio</td>
                <td colspan="2">Acción</td>
            </tr>
            <?php if(isset($_GET['btn_buscar'])): ?>
                <?php foreach($resultados as $fila): ?>
                    <tr>
                        <td><?php echo $fila['clasificacion']; ?></td>
                        <td><a href="update_tip_medicam.php?id_cla=<?php echo $fila['id_cla']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_tip_medicam.php?id_cla=<?php echo $fila['id_cla']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <?php $consulta = $con->prepare("SELECT * FROM tipo_medicamento");
                      $consulta->execute();
                      while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $fila['clasificacion']; ?></td>
                        <td><a href="update_tip_medicam.php?id_cla=<?php echo $fila['id_cla']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_tip_medicam.php?id_cla=<?php echo $fila['id_cla']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
