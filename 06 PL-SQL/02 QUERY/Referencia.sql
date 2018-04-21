-- eliminar
DELETE FROM REFERENCIA
WHERE ID_REFERENCIA = 1;

-- listarPorPaciente
SELECT
  *
FROM VistaReferencias v
WHERE v.ID_PACIENTE=1;

--listarPorCentroRemite
SELECT
  *
FROM VistaReferencias v
WHERE v.id_centro_medico_remite=1;

-- listarRecibidas
SELECT
  *
FROM VistaReferencias v
WHERE v.id_centro_medico_recibe=1;

-- listarPorMedico // POR CENTRO
SELECT
  *
FROM VistaReferencias v
WHERE v.ID_MEDICO =1
AND v.id_centro_medico_remite=2;