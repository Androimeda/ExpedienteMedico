CREATE OR REPLACE PROCEDURE PL_ActualizarPaciente(
  idPaciente IN INT
  ,pdireccion IN VARCHAR
  ,pcorreo IN VARCHAR
  ,idEscolaridad IN INT
  ,idOcupacion IN INT
  ,idEstadoCivil IN INT
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
  IF idPaciente = '' OR idPaciente IS NULL THEN
    mensaje:= mensaje || 'idPaciente, ';
    RETURN ;
  END IF;
  IF pdireccion = '' OR pdireccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
    RETURN ;
  END IF;
  IF pcorreo = '' OR pcorreo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
    RETURN ;
  END IF;
  IF idEscolaridad = '' OR idEscolaridad IS NULL THEN
    mensaje:= mensaje || 'idEscolaridad, ';
    RETURN ;
  END IF;
  IF idOcupacion = '' OR idOcupacion IS NULL THEN
    mensaje:= mensaje || 'idOcupacion, ';
    RETURN ;
  END IF;
  IF idEstadoCivil = '' OR idEstadoCivil IS NULL THEN
    mensaje:= mensaje || 'idEstadoCivil, ';
    RETURN ;
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

SELECT COUNT(*) INTO vnConteo
  FROM ESCOLARIDAD
  WHERE idEscolaridad= ID_ESCOLARIDAD;
IF vnConteo=0 THEN
  mensaje:='Escolaridad: '|| idEscolaridad||'no esta registrada';
  RETURN ;
END IF;

SELECT COUNT(*) INTO vnConteo
  FROM OCUPACION
  WHERE idOcupacion=ID_OCUPACION;
IF vnConteo=0 THEN
  mensaje:='el identificador de ocupacion: '||idOcupacion||'no esta registrado';
  RETURN ;
END IF;
SELECT COUNT(*) INTO vnConteo
  FROM ESTADOCIVIL
  WHERE idEstadoCivil=ID_ESTADO_CIVIL;
IF vnConteo=0 THEN
   mensaje:='el identificador de estado civil : '||idEstadoCivil||'no esta registrado';
  RETURN ;
END IF;
UPDATE PACIENTE
  SET
    ID_ESCOLARIDAD=idEscolaridad,
    ID_OCUPACION=idOcupacion,
    ID_ESTADO_CIVIL=idEstadoCivil
  WHERE
    ID_PACIENTE=idPaciente;

  UPDATE  PERSONA
    SET
      DIRECCION=pdireccion,
      CORREO=pcorreo
    WHERE
      ID_PERSONA=
              (SELECT  P.ID_PERSONA
              FROM PACIENTE P
              WHERE P.ID_PACIENTE=idPaciente);
  COMMIT ;
  mensaje:='Se actualizaron los registros correctamente';
  resultado:=1;
END;
/