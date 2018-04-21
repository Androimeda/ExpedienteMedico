CREATE OR REPLACE PROCEDURE PL_CrearParamedico(
  pNombre IN VARCHAR
  ,sNombre IN VARCHAR
  ,pApellido IN VARCHAR
  ,sApellido IN VARCHAR
  ,direccion IN VARCHAR
  ,sexo IN VARCHAR
  ,noIdentidad IN VARCHAR
  ,correo IN VARCHAR
  ,idPais IN INT
  ,licencia IN VARCHAR
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
  IF sexo = '' OR sexo IS NULL THEN
    mensaje:= mensaje || 'sexo, ';
  END IF;
  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
  END IF;
  IF correo = '' OR correo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF idPais = '' OR idPais IS NULL THEN
    mensaje:= mensaje || 'idPais, ';
  END IF;
  IF licencia = '' OR licencia IS NULL THEN
    mensaje:= mensaje || 'licencia, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT COUNT(*) INTO vnConteo
  FROM PERSONA
  WHERE NO_IDENTIDAD=noIdentidad;
IF vnConteo=0 THEN
  mensaje:='el numero de id: '||noIdentidad||'no existe';
  RETURN ;
END IF;

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


  INSERT INTO PARAMEDICO(
    LICENCIA,
    ID_PERSONA
  )VALUES (
    licencia,
    ?
  ) RETURNING ID_PERSONA INTO ID_PERSONA;
  COMMIT ;
  resultado:=1;
END;