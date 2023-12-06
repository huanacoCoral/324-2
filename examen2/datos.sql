CREATE TABLE FlujoProceso (
    codFlujo VARCHAR (3),
    proceso VARCHAR(3),
    procesoSiguiente VARCHAR(3),
    tipo VARCHAR(1),
    rol VARCHAR(30),
    pantalla VARCHAR(55)
);
INSERT INTO FlujoProceso (codFlujo, proceso, procesoSiguiente, tipo, rol, pantalla)
VALUES
('F2', 'P1', 'P2', 'I', 'estudiante', 'inicio'),
('F2', 'P2', null, 'C', 'tutor', 'revision'),
('F2', 'P3', null, 'F', 'tutor', 'rechazo'),
('F2', 'P4', 'P5', 'P', 'tutor', 'aprobacion'),
('F2', 'P5', 'P6', 'P', 'estudiante', 'desarrollo'),
('F2', 'P6', 'P7', 'P', 'tutor', 'presentacion'),
('F2', 'P7', 'P8', 'P', 'tutor', 'revision'),
('F2', 'P8', null, 'F', 'estudiante', 'defensa');

CREATE TABLE FlujoProcesoCondicionante (
    codFlujo  VARCHAR(3),
    proceso VARCHAR(3),
    procesoPositivo VARCHAR(3),
    procesoNegativo VARCHAR(3)
);
INSERT INTO FlujoProcesoCondicionante (codFlujo, proceso, procesoPositivo, procesoNegativo)
VALUES ('F2', 'P2', 'P4', 'P3');

CREATE TABLE FlujoProcesoSeguimientoActividad (
    flujo VARCHAR(10),
    Proceso VARCHAR(10),
    Tema VARCHAR(50),
    Estudiante VARCHAR(50),
    FechaInicio DATE,
    HoraInicio TIME,
    FechaFin DATE,
    HoraFin TIME
);
INSERT INTO FlujoProcesoSeguimientoActividad
VALUES
('F2', 'P1', 'T1', 'mdaf', '2020-05-20', '10:10:00', '2020-05-20', '03:09:00'),
('F2', 'P2', 'T1', 'mdaf', '2020-05-20', '12:00:00', '2020-05-25', '13:00:00'),
('F2', 'P3', 'T1', 'mdaf', '2020-05-25', '13:00:00', NULL, NULL),
('F2', 'P1', 'T3', 'rdeigo', '2020-05-30', '14:00:00', '2020-05-30', '14:15:00'),
('F2', 'P2', 'T3', 'rdeigo', '2020-05-30', '14:15:00', '2020-05-30', '14:45:00'),
('F2', 'P4', 'T3', 'rdeigo', '2020-05-30', '14:45:00', '2020-05-30', '14:50:00'),
('F2', 'P5', 'T3', 'rdeigo', '2020-05-30', '13:00:00', '2020-06-30', '14:00:00'),
('F2', 'P6', 'T3', 'rdeigo', '2020-06-30', '14:00:00', '2020-06-30', '15:00:00'),
('F2', 'P7', 'T3', 'rdeigo', '2020-07-30', '19:00:00', '2020-05-30', '20:00:00');

CREATE TABLE alumno (
    ci VARCHAR(10),
    nombre VARCHAR(25) 
);
INSERT INTO alumno (ci, nombre)
VALUES
    ('1', 'mdaf'),
    ('2', 'rdeigo');
