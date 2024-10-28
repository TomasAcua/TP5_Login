<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="../accion/verificarLogin.php" method="post">
        <label>Usuario:</label>
        <input type="text" name="nombre_usuario" required>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
