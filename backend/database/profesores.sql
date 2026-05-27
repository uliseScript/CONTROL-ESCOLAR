USE control_escolar;

CREATE TABLE profesores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido_paterno VARCHAR(100) NOT NULL,
    apellido_materno VARCHAR(100),
    rfc VARCHAR(20) UNIQUE NOT NULL,
    especialidad VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    telefono VARCHAR(15),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE calificaciones_parciales (
    id INT PRIMARY KEY AUTO_INCREMENT,
    profesor_id INT,
    alumno_id INT,
    materia VARCHAR(100) NOT NULL,
    parcial INT CHECK (parcial BETWEEN 1 AND 3),
    calificacion DECIMAL(4,2) CHECK (calificacion BETWEEN 0 AND 10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (profesor_id) REFERENCES profesores(id),
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE calificaciones_finales (
    id INT PRIMARY KEY AUTO_INCREMENT,
    profesor_id INT,
    alumno_id INT,
    materia VARCHAR(100) NOT NULL,
    calificacion DECIMAL(4,2) CHECK (calificacion BETWEEN 0 AND 10),
    status ENUM('aprobado', 'reprobado') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (profesor_id) REFERENCES profesores(id),
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE examenes_extraordinarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    profesor_id INT,
    alumno_id INT,
    materia VARCHAR(100) NOT NULL,
    calificacion DECIMAL(4,2) CHECK (calificacion BETWEEN 0 AND 10),
    fecha_examen DATE NOT NULL,
    status ENUM('aprobado', 'reprobado') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (profesor_id) REFERENCES profesores(id),
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);

CREATE TABLE asistencias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    profesor_id INT,
    alumno_id INT,
    materia VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    status ENUM('presente', 'ausente', 'justificado') DEFAULT 'presente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (profesor_id) REFERENCES profesores(id),
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
);
