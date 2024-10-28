<?php
require_once '../control/Session.php';
require_once '../modelo/BaseDatos.php';
require_once '../modelo/Usuario.php';

$session = new Session();
if (!$session->validar() || $session->getRol() != 'admin') {
    header("Location: login.php");
    exit();
}

$database = new BaseDatos();
$db = $database->conectar();
$usuarioModel = new Usuario($db);
$usuarios = $usuarioModel->obtenerUsuarios();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h2>Listado de Usuarios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre de Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nombre_usuario']; ?></td>
                <td><?php echo $usuario['rol']; ?></td>
                <td><?php echo $usuario['estado'] ? 'Activo' : 'Inactivo'; ?></td>
                <td>
                    <a href="../accion/actualizarLogin.php?id=<?php echo $usuario['id']; ?>">Actualizar</a> |
                    <a href="../accion/eliminarLogin.php?id=<?php echo $usuario['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="paginaSegura.php">Volver</a>
</body>
</html>
