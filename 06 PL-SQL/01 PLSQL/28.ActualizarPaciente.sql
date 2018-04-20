CREATE OR REPLACE PROCEDURE PL_ActualizarPaciente(
  idPaciente IN INT
  ,direccion IN VARCHAR
  ,correo IN VARCHAR
  ,idEscolaridad IN INT
  ,idOcupacion IN INT
  ,idEstadoCivil IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idPaciente = '' OR idPaciente IS NULL THEN
    mensaje:= mensaje || 'idPaciente, ';
  END IF;
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF correo = '' OR correo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF idEscolaridad = '' OR idEscolaridad IS NULL THEN
    mensaje:= mensaje || 'idEscolaridad, ';
  END IF;
  IF idOcupacion = '' OR idOcupacion IS NULL THEN
    mensaje:= mensaje || 'idOcupacion, ';
  END IF;
  IF idEstadoCivil = '' OR idEstadoCivil IS NULL THEN
    mensaje:= mensaje || 'idEstadoCivil, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;