-- eliminar
DELETE FROM REFERENCIA
WHERE ID_REFERENCIA =%s;

-- listarPorPaciente
SELECT
  *
FROM VistaReferencias v
WHERE v.ID_PACIENTE=%s;

--listarPorCentroRemite
SELECT
  *
FROM VistaReferencias v
WHERE v.id_centro_medico_remite=%s;

-- listarRecibidas
SELECT
  *
FROM VistaReferencias v
WHERE v.id_centro_medico_recibe=%s;

-- listarPorMedico // POR CENTRO
SELECT
  *
FROM VistaReferencias v
WHERE v.ID_MEDICO =%s
AND v.id_centro_medico_remite=%s;