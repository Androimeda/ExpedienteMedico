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
  id_persona_insert INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
  id_persona_insert:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF pNombre = '' OR pNombre IS NULL THEN
    mensaje:= mensaje || 'pNombre, ';
  END IF;
  IF pApellido = '' OR pApellido IS NULL THEN
    mensaje:= mensaje || 'pApellido, ';
  END IF;
  IF sexo = '' OR sexo IS NULL OR SEXO NOT IN ('F','M') THEN
    mensaje:= mensaje || 'sexo (F OR M), ';
  END IF;
  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
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
  FROM PAIS
  WHERE  idPais=ID_PAIS;
IF vnConteo=0 THEN
    mensaje:='EL pais: '|| idPais ||'no esta registrado.';
    RETURN ;
END IF;

SELECT COUNT(*) INTO vnConteo
  FROM PERSONA
  WHERE NO_IDENTIDAD=noIdentidad;
IF vnConteo!=0 THEN
  mensaje:='el numero de id: '||noIdentidad||' ya existe';
  SELECT
    ID_PERSONA
  INTO id_persona_insert
  FROM PERSONA
  WHERE NO_IDENTIDAD = noIdentidad;
ELSE
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
  ) RETURNING ID_PERSONA INTO id_persona_insert;

    IF id_persona_insert=0 THEN
    mensaje:='Ocurrio un error en la insercion de persona, no se guardó nada';
    ROLLBACK;
    RETURN;
  END IF;
END IF;

  SELECT
    COUNT(*)
  INTO vnConteo
  FROM PARAMEDICO
  WHERE ID_PERSONA = id_persona_insert;

  IF vnConteo!=0 THEN
    mensaje:='Registro de Paramedico ya existe en la tabla, persona con el mismo noIdentidad en tabla paramedico';
    RETURN;
  ELSE

  INSERT INTO PARAMEDICO(
    LICENCIA,
    ID_PERSONA
  )VALUES (
    licencia,
    id_persona_insert
  );
  COMMIT ;
  mensaje:='Ingresado correctamente';
  resultado:=1;
  END IF;
END;
/