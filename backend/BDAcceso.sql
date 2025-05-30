-- Crear base de datos
CREATE DATABASE IF NOT EXISTS sistema_educativo;
USE sistema_educativo;

-- Tabla de instituciones educativas
CREATE TABLE instituciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    distrito VARCHAR(100),
    zona ENUM('Rural', 'Urbana') NOT NULL
);

-- Tabla de estudiantes
CREATE TABLE estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dni CHAR(8) UNIQUE NOT NULL,
    nombre_completo VARCHAR(100) NOT NULL,
    id_institucion INT,
    zona ENUM('Rural', 'Urbana'),
    nivel_socioeconomico ENUM('Bajo', 'Medio', 'Alto'),
    acceso_tecnologia BOOLEAN,
    FOREIGN KEY (id_institucion) REFERENCES instituciones(id)
);

-- Tabla de indicadores educativos (por estudiante)
CREATE TABLE indicadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_estudiante INT,
    anio INT,
    asistencia DECIMAL(5,2), -- %
    rendimiento DECIMAL(5,2), -- Promedio
    participacion BOOLEAN,
    FOREIGN KEY (id_estudiante) REFERENCES estudiantes(id)
);

-- Tabla de estrategias sugeridas
CREATE TABLE estrategias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    tipo ENUM('Tecnología', 'Capacitación', 'Económica', 'Infraestructura'),
    impacto_estimado VARCHAR(255)
);

-- Tabla de recomendaciones aplicadas (por institución)
CREATE TABLE recomendaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_institucion INT,
    id_estrategia INT,
    fecha_aplicacion DATE,
    resultado_preliminar TEXT,
    FOREIGN KEY (id_institucion) REFERENCES instituciones(id),
    FOREIGN KEY (id_estrategia) REFERENCES estrategias(id)
);
