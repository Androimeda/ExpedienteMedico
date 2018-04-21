CREATE OR REPLACE PROCEDURE PL_ActualizarReceta(
  idTratamiento IN INT
  ,idConsulta IN INT
  ,idMedico IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  vnConteo NUMBER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idTratamiento = '' OR idTratamiento IS NULL THEN
    mensaje:= mensaje || 'idTratamiento, ';
  END IF;
  IF idConsulta = '' OR idConsulta IS NULL THEN
    mensaje:= mensaje || 'idConsulta, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT COUNT(*) INTO vnConteo
    FROM  TRATAMIENTO
    WHERE idTratamiento=ID_TRATAMIENTO;
  IF vnConteo=0 THEN
    mensaje:='el tratamiento con identificador: '||idTratamiento||'no esta registrada';
    RETURN ;
  END IF;
  SELECT COUNT(*) INTO vnConteo
    FROM  CONSULTAEXTERNA
    WHERE idConsulta=ID_CONSULTA;
  IF vnConteo=0 THEN
    mensaje:='la consulta con identificador: '||idConsulta||'no esta registrada';
    RETURN ;
  END IF;

  SELECT COUNT(*) INTO vnConteo
    FROM  MEDICO
    WHERE idMedico=ID_MEDICO;
  IF vnConteo=0 THEN
    mensaje:='el medico con identificador: '||idMedico||'no esta registradi';
    RETURN ;
  END IF;

  UPDATE TRATAMIENTOCONSULTA
    SET
    ID_CONSULTA=idConsulta,
    ID_TRATAMIENTO=idTratamiento,
    ID_MEDICO=idMedico
  WHERE
    ID_TRATAMIENTO=idTratamiento;
  COMMIT ;
  mensaje:='Se actualizo la receta correctamente';
END;
