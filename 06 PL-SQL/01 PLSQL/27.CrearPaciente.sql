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
  temMensaje VARCHAR(2000);
  vnConteo NUMBER;
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
SELECT COUNT(*) INTO vnConteo
  FROM PERSONA
  WHERE ID_PAIS=idPais;
IF vnConteo=0 THEN
  mensaje:='EL pais con el identificador: '|| idPais||'no esta registrado';
  RETURN ;
END IF;
SELECT COUNT(*) INTO vnConteo
  FROM TIPOSANGRE
  WHERE idTipoSangre= ID_TIPO_SANGRE;
IF vnConteo=0 THEN
  mensaje='EL tipo de sangre: '|| idTipoSangre||'no esta registrado';
  RETURN ;
END IF;
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
SELECT COUNT(*) INTO vnConteo
  FROM ASCENDENCIA
  WHERE idAscendencia=ID_ASCENDENCIA;
IF vnConteo=0 THEN
  mensaje:='el identificador de ascendencia con : '|| idAscendencia||'NO esta registrado';
  RETURN ;
END IF;

SELECT COUNT(*) INTO vnConteo
  FROM PERSONA
  WHERE noIdentidad=NO_IDENTIDAD;
IF vnConteo=0 THEN
  mensaje:='El numero de identidad: '|| noIdentidad||'no existe';
  RETURN ;
END IF ;
SELECT COUNT(*) INTO vnConteo
  FROM PAIS
  WHERE  idPais=ID_PAIS;
IF vnConteo=0 THEN
    mensaje:='EL pais: '|| idPais ||'no esta registrado.';
  RETURN ;
END IF;
  INSERT INTO PERSONA(
    P_NOMBRE,
    S_NOMBRE,
    P_APELLIDO,
    S_APELLIDO,
    DIRECCION,

    NO_IDENTIDAD,
    ID_PAIS,
    SEXO,
    CORREO
  )VALUES (
    pNombre,
    sNombre,
    pApellido,
    sApellido,
    direccion,
    noIdentidad,
    idPais,
    sexo,
    correo
  );
  INSERT INTO PACIENTE(
    ID_PERSONA,
    ID_TIPO_SANGRE,
    ID_ESCOLARIDAD,
    ID_OCUPACION,
    ID_ESTADO_CIVIL,
    ID_ASCENDENCIA

  )VALUES (
    ?,
    idTipoSangre,
    idEscolaridad,
    idOcupacion,
    idEstadoCivil,
    idAscendencia
  )RETURNING ID_PERSONA INTO ID_PERSONA;
END;