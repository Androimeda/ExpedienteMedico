CREATE OR REPLACE PROCEDURE PL_CrearPaciente(
  pNombre IN VARCHAR
  ,sNombre IN VARCHAR
  ,pApellido IN VARCHAR
  ,sApellido IN VARCHAR
  ,direccion IN VARCHAR
  ,noIdentidad IN VARCHAR
  ,idPais IN INT
  ,sexo IN VARCHAR
  ,correo IN VARCHAR
  ,idTipoSangre IN INT
  ,idEscolaridad IN INT
  ,idOcupacion IN INT
  ,idEstadoCivil IN INT
  ,idAscendencia IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF pNombre = '' OR pNombre IS NULL THEN
    mensaje:= mensaje || 'pNombre, ';
  END IF;
  IF sNombre = '' OR sNombre IS NULL THEN
    mensaje:= mensaje || 'sNombre, ';
  END IF;
  IF pApellido = '' OR pApellido IS NULL THEN
    mensaje:= mensaje || 'pApellido, ';
  END IF;
  IF sApellido = '' OR sApellido IS NULL THEN
    mensaje:= mensaje || 'sApellido, ';
  END IF;
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
  END IF;
  IF idPais = '' OR idPais IS NULL THEN
    mensaje:= mensaje || 'idPais, ';
  END IF;
  IF sexo = '' OR sexo IS NULL THEN
    mensaje:= mensaje || 'sexo, ';
  END IF;
  IF correo = '' OR correo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF idTipoSangre = '' OR idTipoSangre IS NULL THEN
    mensaje:= mensaje || 'idTipoSangre, ';
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
  IF idAscendencia = '' OR idAscendencia IS NULL THEN
    mensaje:= mensaje || 'idAscendencia, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;