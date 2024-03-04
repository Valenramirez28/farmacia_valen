<?php
session_start();
    require_once("../../../../db/connection.php"); 
    $conexion = new Database();
    $con = $conexion->conectar();
    
?>

<?php 
    
    $sentencia_select=$con->prepare("SELECT * FROM especializacion ORDER BY id_esp ASC");
    
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();
    
    
    if(isset($_GET['btn_buscar'])) {
        $buscar = $_GET['buscar'];
    
        // Preparar la consulta SQL
        $consulta = $con->prepare("SELECT * FROM especializacion WHERE id_esp LIKE :buscar");
    
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
        <title>Especializacion</title>
        <link rel="stylesheet" href="../../css/estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <h2>ESPECIALIZACIONES</h2>
            <div class="row mt-3">
        <div class="col-md-6">
            <form action="../index.php">
                <input type="submit" value="Regresar" class="btn btn-secondary"/>
            </form>
        </div>
        <div>
            <div class="barra_buscador">
                <form action="" class="formulario" method="GET">
                    <input type="text" name="buscar" placeholder="Buscar Especializacion" class="input_text">
                    <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                    <a href="insert_esp.php" class="btn btn_nuevo">Crear Especialización</a>
                </form>
            </div>
            <table>
                <tr class="head">
                    <td>Id_esp</td>
                    <td>Especializacion</td>
                    <td colspan="2">Acción</td>
                </tr>
                <?php 
                if(isset($_GET['btn_buscar'])) {
                    $buscar = $_GET['buscar'];
                    $consulta = $con->prepare("SELECT * FROM especializacion WHERE id_esp LIKE ?");
                    $consulta->execute(array("%$buscar%"));
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_esp']; ?></td>
                        <td><?php echo $fila['especializacion']; ?></td>
                        <td><a href="update_esp.php?id_esp=<?php echo $fila['id_esp']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_esp.php?id_esp=<?php echo $fila['id_esp']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php 
                    }
                } else {
                    // Mostrar todos los registros si no se ha realizado una búsqueda
                    $consulta = $con->prepare("SELECT * FROM especializacion");
                    $consulta->execute();
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $fila['id_esp']; ?></td>
                        <td><?php echo $fila['especializacion']; ?></td>
                        <td><a href="update_esp.php?id_esp=<?php echo $fila['id_esp']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_esp.php?id_esp=<?php echo $fila['id_esp']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php 
                    }
                }
                ?>
            </table>
        </div>
    </body>
    </html>

