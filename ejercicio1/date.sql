CREATE TABLE FlujoProceso (
    codFlujo VARCHAR(5),
    proceso VARCHAR(5),
    procesoSiguiente VARCHAR(5),
    tipo VARCHAR(2),
    rol VARCHAR(20),
    pantalla VARCHAR(15)
);
INSERT INTO FlujoProceso (codFlujo, proceso, procesoSiguiente, tipo, rol, pantalla)
VALUES
('F1', 'P1', 'P2', 'I', 'estudiante', 'solicitud'),
('F1', 'P2', NULL, 'C', 'Kardex', 'verificacion'),
('F1', 'P3', NULL, 'F', 'Kardex', 'rechazo'),
('F1', 'P4', 'P5', 'P', 'Kardex', 'selloFirma'),
('F1', 'P5', NULL, 'F', 'estudiante', 'entrega');

CREATE TABLE FlujoProcesoCondicionante (
    codFlujo VARCHAR(5),
    proceso VARCHAR(5),
    IDEstudiante VARCHAR(10),
    procesoPositivo VARCHAR(5),
    procesoNegativo VARCHAR(5)
);
INSERT INTO FlujoProcesoCondicionante (codFlujo, proceso, IDEstudiante, procesoPositivo, procesoNegativo)
VALUES
('F1', 'P2','1','P3', 'P4');

CREATE TABLE ProcesoSeguimientoActividad (
    codFlujo VARCHAR(5),
    proceso VARCHAR(5),
    IDEstudiante VARCHAR(10),
    FechaInicio DATE,
    FechaFin DATE
);

-- Inserción de datos de ejemplo en la tabla ProcesoSeguimientoActividad
INSERT INTO ProcesoSeguimientoActividad (codFlujo, proceso, IDEstudiante, FechaInicio, FechaFin)
VALUES
('F1', 'P2', 1, '2023-01-01', '2023-01-05'),
('F1', 'P3', 1, '2023-01-06', '2023-01-10');

-- Tabla de Estudiantes
CREATE TABLE Estudiante (
    IDEstudiante VARCHAR(10),
    nombre VARCHAR(50)
);
INSERT INTO Estudiante  VALUES
('1','Nombre');

CREATE TABLE aceptados (
    id VARCHAR(100),
    nombre VARCHAR(50)
);

-- Crear la tabla 'rechazados'
CREATE TABLE rechazados (
    id VARCHAR(10),
    nombre VARCHAR(50)
    );
INSERT INTO aceptados  VALUES ('NombreAceptado1', 12345);
INSERT INTO aceptados VALUES ('NombreAceptado2', 67890);

-- Insertar datos en la tabla 'rechazados'
INSERT INTO rechazados VALUES ('NombreRechazado1', 54321);
INSERT INTO rechazados VALUES ('NombreRechazado2', 98765);