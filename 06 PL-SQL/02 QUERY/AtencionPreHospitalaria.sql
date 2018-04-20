----------------------- CONSULTAS

-- listarTodos
SELECT
  *
FROM vistaAPH

;

/*Agregada:: faltaba ver archivo info*/
-- listarPorPaciente
SELECT
  *
FROM vistaAPH v
WHERE v.ID_EXPEDIENTE = 1;

-- listarPorAmbulancia
SELECT
  *
FROM vistaAPH V
WHERE V.PLACA= 'POK-9643';
;

-- listarPorcentroMedico
SELECT
  *
FROM vistaAPH V
WHERE
   V.NOMBRE='Alonzo suazo' OR V.ID_CENTRO_MEDICO=2
;
-- listarPor PARAMEDICO
SELECT
  *
FROM vistaAPH V
WHERE
   V.ID_PARAMEDICO=3
;

--eliminar
DELETE FROM ATENCIONPREHOSPITALARIA
WHERE ID_ATENCION = 1;