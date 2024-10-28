<?php
class Session {
    public function __construct() {
        session_start();
    }

    public function iniciar($nombreUsuario, $rol) {
        $_SESSION['nombre_usuario'] = $nombreUsuario;
        $_SESSION['rol'] = $rol;
    }

    public function validar() {
        return isset($_SESSION['nombre_usuario']);
    }

    public function activa() {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public function getUsuario() {
        return $_SESSION['nombre_usuario'] ?? null;
    }

    public function getRol() {
        return $_SESSION['rol'] ?? null;
    }

    public function cerrar() {
        session_unset();
        session_destroy();
    }
}
