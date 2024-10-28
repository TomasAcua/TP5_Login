<?php
require_once '../modelo/BaseDatos.php';
require_once '../modelo/Usuario.php';

class UsuarioController {
    private $db;
    private $session;

    public function __construct() {
        $database = new BaseDatos();
        $this->db = $database->conectar();
        $this->session = new Session();
    }

    public function login($nombreUsuario, $password) {
        $usuarioModel = new Usuario($this->db);
        $usuario = $usuarioModel->buscarPorNombre($nombreUsuario);

        if ($usuario && hash('sha256', $password) === $usuario['password']) {
            $this->session->iniciar($usuario['nombre_usuario'], $usuario['rol']);
            return true;
        }
        return false;
    }
}
