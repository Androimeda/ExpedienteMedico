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
WHERE v.ID_EXPEDIENTE =%s;
-- listarPorAmbulancia
SELECT
  *
FROM vistaAPH V
WHERE V.PLACA= '%s';
;
-- listarPorcentroMedico
SELECT
  *
FROM vistaAPH V
WHERE
   V.NOMBRE='%s' OR V.ID_CENTRO_MEDICO=%s
;
-- listarPor PARAMEDICO
SELECT
  *
FROM vistaAPH V
WHERE
   V.ID_PARAMEDICO=%s
;
--eliminar
DELETE FROM ATENCIONPREHOSPITALARIA
WHERE ID_ATENCION =%s;