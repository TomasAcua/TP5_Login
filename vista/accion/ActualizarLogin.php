<?php
require_once '../modelo/BaseDatos.php';
require_once '../modelo/Usuario.php';
require_once '../control/Session.php';

$session = new Session();
if (!$session->validar() || $session->getRol() != 'admin') {
    header("Location: ../vista/login.php");
    exit();
}

$database = new BaseDatos();
$db = $database->conectar();
$usuarioModel = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioModel->actualizarUsuario($_POST['id'], $_POST['nombre_usuario'], $_POST['rol']);
    header("Location: ../vista/listarUsuarios.php");
    exit();
} else {
    $usuario = $usuarioModel->buscarPorId($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="../vista/css/estilos.css">
</head>
<body>
    <h2>Actualizar Usuario</h2>
    <form method="post" action="actualizarLogin.php">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        <label>Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" value="<?php echo $usuario['nombre_usuario']; ?>" required>
        <label>Rol:</label>
        <select name="rol">
            <option value="usuario" <?php echo $usuario['rol'] == 'usuario' ? 'selected' : ''; ?>>Usuario</option>
            <option value="admin" <?php echo $usuario['rol'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select>
        <button type="submit">Actualizar</button>
    </form>
    <a href="../vista/listarUsuarios.php">Volver</a>
</body>
</html>
