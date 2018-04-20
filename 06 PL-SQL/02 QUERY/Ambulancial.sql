--CONSULTAS

-- listarTodos /*Por centro*/
SELECT
  *
FROM vistaAmbulancia V
WHERE
  v.ID_CENTRO_MEDICO=1
  --V.ID_PARAMEDICO = 1
  --AND V.ID_AMBULANCIA = 1
;

-- listarPorAmbulancia
SELECT
  *
FROM vistaAmbulancia v
WHERE v.ID_AMBULANCIA=1 OR v.PLACA='DDS-1256'
;

-- listarPorcentroMedico
SELECT
  *
FROM vistaAmbulancia v
WHERE v.NOMBRE LIKE 'Alonzo%' OR  V.ID_CENTRO_MEDICO=1
;

--eliminar
DELETE FROM AMBULANCIA
WHERE ID_AMBULANCIA = 1;