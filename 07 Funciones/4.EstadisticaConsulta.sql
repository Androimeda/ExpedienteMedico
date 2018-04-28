CREATE OR REPLACE FUNCTION FN_EstadisticaConsulta (
	pIdCentro IN INT,
	Mensaje OUT VARCHAR,
	Resultado OUT SMALLINT			

)RETURN NUMBER
IS
------DECLARE-------
vnConteo NUMBER;
estConsulta NUMBER;
BEGIN
	Mensaje:='';
	Resultado:=0;
---------VALIDACION DE CAMPOS---------
IF pIdCentro= '' OR pIdCentro IS NULL THEN
	Mensaje:= Mensaje||'pIdCentro, ';
END IF;

IF Mensaje<>'' OR Mensaje IS NOT NULL THEN
	Mensaje:= 'campos requeridos: ' || Mensaje;
RETURN 0;
END IF;

---------------CUERPO DE UNA FN-----------------------
SELECT COUNT(*) INTO vnConteo
FROM CENTROMEDICO
WHERE pIdCentro= id_centro_medico;
IF vnConteo=0 THEN
	Mensaje:='El centro medico con el identificador: '|| pIdCentro|| 'no esta registrado';
RETURN -1;
END IF;

SELECT COUNT(*)
FROM VistaConsultasDiarias vw_con
WHERE vw_con.id_centro_medico=pIdCentro;

Mensaje:='consulta realizada con éxito';
Resultado:=1;
RETURN estConsulta;
END;
/