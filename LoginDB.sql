<?php
CREATE DATABASE LoginDB;
USE LoginDB;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('usuario', 'admin') DEFAULT 'usuario',
    estado BOOLEAN DEFAULT TRUE
);

INSERT INTO usuarios (nombre_usuario, password, rol, estado) 
VALUES ('admin', SHA2('admin123', 256), 'admin', TRUE),
       ('usuario', SHA2('usuario123', 256), 'usuario', TRUE);

