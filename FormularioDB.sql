-- Crear la base de datos
CREATE DATABASE FormularioDB;
GO

-- Usar la base de datos
USE FormularioDB;
GO

-- Crear la tabla para almacenar los formularios
CREATE TABLE Formularios (
    Id INT IDENTITY(1,1) PRIMARY KEY,            -- Identificador único del formulario
    FechaInicio DATE NOT NULL,                   -- Fecha de inicio
    FechaFin DATE NOT NULL,                      -- Fecha de finalización
    Notas NVARCHAR(MAX) NULL,                    -- Notas opcionales
    NombreGerente NVARCHAR(100) NOT NULL,        -- Nombre del gerente
    CorreoGerente NVARCHAR(150) NOT NULL,        -- Correo del gerente
    PrimerNombre NVARCHAR(100) NOT NULL,         -- Primer nombre del usuario
    Apellido NVARCHAR(100) NOT NULL,             -- Apellido del usuario
    Correo NVARCHAR(150) NOT NULL,               -- Correo del usuario
    Telefono NVARCHAR(20) NULL                   -- Teléfono del usuario (opcional)
);
GO
