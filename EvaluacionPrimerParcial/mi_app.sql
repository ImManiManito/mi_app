CREATE DATABASE mi_app;
GO

-- Usar la base de datos
USE mi_app;
GO

-- Tabla de usuarios (para login y roles)
CREATE TABLE usuarios (
    id INT IDENTITY(1,1) PRIMARY KEY,
    usuario NVARCHAR(50) UNIQUE NOT NULL,
    password NVARCHAR(255) NOT NULL,
    rol NVARCHAR(20) CHECK (rol IN ('admin', 'usuario')) NOT NULL
);
GO

-- Tabla de contactos
CREATE TABLE contacto (
    id INT IDENTITY(1,1) PRIMARY KEY,
    nombre NVARCHAR(100) NOT NULL,
    email NVARCHAR(100) UNIQUE NOT NULL,
    telefono NVARCHAR(20) NOT NULL
);
GO

-- Insertar un usuario administrador inicial
INSERT INTO usuarios (usuario, password, rol) 
VALUES ('admin', '*5Migente_2025\\', 'admin');
GO
