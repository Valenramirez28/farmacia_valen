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
    $consulta = $con->prepare("SELECT * FROM t_documento WHERE tipo LIKE :buscar");

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
    <title>Tipos de Documentos</title>
    <link rel="stylesheet" href="../../css/tip_usu.css">
</head>
<body>
    <div class="contenedor">
        <h2>TIPOS DE DOCUMENTOS</h2>
        <div class="row mt-3">
    <div class="col-md-6">
        <?php if(isset($_GET['btn_buscar'])): ?>
            <form action="index_docu.php" method="get">
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
                <input type="text" name="buscar" placeholder="Buscar Tipo de Documento" class="input_text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                <a href="insert_docu.php" class="btn btn_nuevo">Crear Tipo de Documento</a>
            </form>
        </div>
        <table>
            <tr class="head">
                <td>Tipo de Documento</td>
                <td colspan="2">Acción</td>
            </tr>
            <?php if(isset($_GET['btn_buscar'])): ?>
                <?php foreach($resultados as $fila): ?>
                    <tr>
                        <td><?php echo $fila['tipo']; ?></td>
                        <td><a href="update_docu.php?id_rol=<?php echo $fila['id_doc']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_docu.php?id_rol=<?php echo $fila['id_doc']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <?php $consulta = $con->prepare("SELECT * FROM t_documento");
                      $consulta->execute();
                      while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $fila['tipo']; ?></td>
                        <td><a href="update_docu.php?id_rol=<?php echo $fila['id_doc']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_docu.php?id_rol=<?php echo $fila['id_doc']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
