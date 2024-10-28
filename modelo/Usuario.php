<?php
require_once 'BaseDatos.php';

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nombre_usuario;
    public $password;
    public $rol;
    public $estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function buscarPorNombre($nombre_usuario) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nombre_usuario = :nombre_usuario AND estado = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre_usuario", $nombre_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerUsuarios() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarUsuario($id) {
        $query = "UPDATE " . $this->table_name . " SET estado = 0 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarUsuario($id, $nombre_usuario, $rol) {
        $query = "UPDATE " . $this->table_name . " SET nombre_usuario = :nombre_usuario, rol = :rol WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre_usuario", $nombre_usuario);
        $stmt->bindParam(":rol", $rol);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}
