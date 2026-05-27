CREATE DATABASE IF NOT EXISTS control_escolar;
USE control_escolar;

CREATE TABLE alumnos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100),
    matricula VARCHAR(20) UNIQUE NOT NULL,
    carrera VARCHAR(100) NOT NULL,
    semestre INT NOT NULL,
    email VARCHAR(100) UNIQUE,
    telefono VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE inscripciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT,
    carrera VARCHAR(100) NOT NULL,
    fecha_inscripcion DATE NOT NULL,
    status ENUM('activo', 'inactivo') DEFAULT 'activo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE reinscripciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT,
    semestre INT NOT NULL,
    fecha_reinscripcion DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE bajas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT,
    motivo TEXT NOT NULL,
    fecha_baja DATE NOT NULL,
    tipo ENUM('temporal', 'definitiva') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE cambios_carrera (
    id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT,
    carrera_anterior VARCHAR(100) NOT NULL,
    carrera_nueva VARCHAR(100) NOT NULL,
    fecha_cambio DATE NOT NULL,
    motivo TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE pagos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT,
    concepto VARCHAR(100) NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    fecha_pago DATE NOT NULL,
    status ENUM('pagado', 'pendiente', 'vencido') DEFAULT 'pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE evaluacion_profesores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    alumno_id INT,
    profesor_id INT,
    puntaje INT CHECK (puntaje BETWEEN 1 AND 10),
    comentario TEXT,
    fecha_evaluacion DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);
