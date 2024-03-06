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
        $consulta = $con->prepare("SELECT * FROM usuarios WHERE documento LIKE :buscar");
    
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
        <title>Usuarios</title>
        <link rel="stylesheet" href="../../css/estilos.css">
    </head>
    <body>
        <div class="contenedor">
            <h2>USUARIOS REGISTRADOS</h2>
            <div class="row mt-3">
        <div class="col-md-6">
        <?php if(isset($_GET['btn_buscar'])): ?>
            <form action="index_usu.php" method="get">
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
                    <input type="text" name="buscar" placeholder="Buscar Usuario" class="input_text">
                    <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                    <a href="create_usu.php" class="btn btn_nuevo">Crear Usuario</a>
                </form>
            </div>
            <table>
                <tr class="head">
                    <td>T. de Documento</td>
                    <td>Documento</td>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Telefono</td>
                    <td>Correo</td>
                    <td>Ciudad</td>
                    <td>Dirección</td>
                    <td>EPS</td>
                    <td>RH</td>
                    <td>Tipo de Usuario</td>
                    <td>Estado</td>
                    <td colspan="2">Acción</td>
                </tr>
                <?php 
                if(isset($_GET['btn_buscar'])) {
                    $buscar = $_GET['buscar'];
                    $consulta = $con->prepare("SELECT * FROM usuarios, t_documento, eps, rh, ciudad,
                    roles, estados WHERE usuarios.id_doc = t_documento.id_doc AND usuarios.id_eps = eps.id_eps
                    AND usuarios.id_rh = rh.id_rh AND usuarios.id_ciudad = ciudad.id_ciudad AND usuarios.id_rol = roles.id_rol
                    AND usuarios.id_estado = estados.id_estado AND documento LIKE ?");
                    $consulta->execute(array("%$buscar%"));
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $fila['tipo']; ?></td>
                        <td><?php echo $fila['documento']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['apellido']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo $fila['ciudad']; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['eps']; ?></td>
                        <td><?php echo $fila['rh']; ?></td>
                        <td><?php echo $fila['rol']; ?></td>
                        <td><?php echo $fila['estado']; ?></td>
                        <td><a href="update_usu.php?documento=<?php echo $fila['documento']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_usu.php?documento=<?php echo $fila['documento']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php 
                    }
                } else {
                    // Mostrar todos los registros si no se ha realizado una búsqueda
                    $consulta = $con->prepare("SELECT * FROM usuarios, t_documento, eps, rh, ciudad,
                    roles, estados WHERE usuarios.id_doc = t_documento.id_doc AND usuarios.id_eps = eps.id_eps
                    AND usuarios.id_rh = rh.id_rh AND usuarios.id_ciudad = ciudad.id_ciudad AND usuarios.id_rol = roles.id_rol
                    AND usuarios.id_estado = estados.id_estado");
                    $consulta->execute();
                    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                    <td><?php echo $fila['tipo']; ?></td>
                        <td><?php echo $fila['documento']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['apellido']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td><?php echo $fila['correo']; ?></td>
                        <td><?php echo $fila['ciudad']; ?></td>
                        <td><?php echo $fila['direccion']; ?></td>
                        <td><?php echo $fila['eps']; ?></td>
                        <td><?php echo $fila['rh']; ?></td>
                        <td><?php echo $fila['rol']; ?></td>
                        <td><?php echo $fila['estado']; ?></td>
                        <td><a href="update_usu.php?documento=<?php echo $fila['documento']; ?>" class="btn__update">Editar</a></td>
                        <td><a href="delete_usu.php?documento=<?php echo $fila['documento']; ?>" class="btn__delete">Eliminar</a></td>
                    </tr>
                <?php 
                    }
                }
                ?>
            </table>
        </div>
        <?php 
    if(isset($_GET['btn_buscar'])) {
        // Si se ha realizado una búsqueda
?>
        
<?php 
    }
?>

    </body>
    </html>

   

            