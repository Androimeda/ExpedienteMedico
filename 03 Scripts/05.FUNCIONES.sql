CREATE OR REPLACE FUNCTION FN_CrearPersona(
    pNombre     IN  VARCHAR
  , sNombre     IN  VARCHAR
  , pApellido   IN  VARCHAR
  , sApellido   IN  VARCHAR
  , direccion   IN  VARCHAR
  , noIdentidad IN  VARCHAR
  , idPais      IN  INT
  , sexo        IN  VARCHAR
  , correo      IN  VARCHAR
  , mensaje     OUT VARCHAR
)
  RETURN INTEGER
IS
  --DECLARE
  vnConteo          NUMBER;
  id_persona_insert INTEGER;
  BEGIN
    mensaje := '';
    /*----------------VALIDACION DE CAMPOS----------------*/
    IF pNombre = '' OR pNombre IS NULL
    THEN
      mensaje := mensaje || 'pNombre, ';
    END IF;
    IF sNombre = '' OR sNombre IS NULL
    THEN
      mensaje := mensaje || 'sNombre, ';
    END IF;
    IF pApellido = '' OR pApellido IS NULL
    THEN
      mensaje := mensaje || 'pApellido, ';
    END IF;
    IF sApellido = '' OR sApellido IS NULL
    THEN
      mensaje := mensaje || 'sApellido, ';
    END IF;
    IF direccion = '' OR direccion IS NULL
    THEN
      mensaje := mensaje || 'direccion, ';
    END IF;
    IF noIdentidad = '' OR noIdentidad IS NULL
    THEN
      mensaje := mensaje || 'noIdentidad, ';
    END IF;
    IF idPais = '' OR idPais IS NULL
    THEN
      mensaje := mensaje || 'idPais, ';
    END IF;
    IF sexo = '' OR sexo IS NULL
    THEN
      mensaje := mensaje || 'sexo, ';
    END IF;
    IF correo = '' OR correo IS NULL
    THEN
      mensaje := mensaje || 'correo, ';
    END IF;
    IF mensaje <> '' OR mensaje IS NOT NULL
    THEN
      mensaje := 'Campos requeridos: ' || mensaje;
      RETURN 0;
    END IF;
    /*---------------- CUERPO DEL PL----------------*/
    SELECT COUNT(*)
    INTO vnConteo
    FROM PERSONA
    WHERE ID_PAIS = idPais;
    IF vnConteo = 0
    THEN
      mensaje := 'EL pais con el identificador: ' || idPais || 'no esta registrado';
      RETURN 0;
    END IF;

    INSERT INTO PERSONA (
      P_NOMBRE,
      S_NOMBRE,
      P_APELLIDO,
      S_APELLIDO,
      DIRECCION,
      NO_IDENTIDAD,
      ID_PAIS,
      SEXO,
      CORREO
    ) VALUES (
      pNombre,
      sNombre,
      pApellido,
      sApellido,
      direccion,
      noIdentidad,
      idPais,
      sexo,
      correo
    )
    RETURNING ID_PERSONA INTO id_persona_insert;
    COMMIT;
    mensaje := 'Registro insertado satisfactoriamente';
    RETURN id_persona_insert;
  END;
/


CREATE OR REPLACE FUNCTION FN_VerificarPersona(

  noIdentidad IN VARCHAR
  ,mensaje OUT VARCHAR

) RETURN SMALLINT
IS
--DECLARE
  vnConteo NUMBER;

BEGIN
  mensaje:='';

/*----------------VALIDACION DE CAMPOS----------------*/

  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN 0;

  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT
    COUNT(*)
  INTO VnConteo
  FROM PERSONA
  WHERE noIdentidad=NO_IDENTIDAD
  ;
  IF vnConteo<>0 THEN
    mensaje:='la persona con identidad: '|| noIdentidad||' ya existe';
    RETURN 1;
  ELSE
    mensaje:='la persona con identidad: '|| noIdentidad||' NO existe';
    RETURN 0;
  END IF;




END;
/


CREATE OR REPLACE FUNCTION FN_VerificarUsuario(
  pcorreo IN VARCHAR
  ,pcontrasena IN VARCHAR
  ,mensaje OUT VARCHAR
) RETURN SMALLINT
IS
--DECLARE
  vnConteo NUMBER;
BEGIN
  mensaje:='';
/*----------------VALIDACION DE CAMPOS----------------*/
  IF pcorreo = '' OR pcorreo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF pcontrasena = '' OR pcontrasena IS NULL THEN
    mensaje:= mensaje || 'contrasena, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN 0;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  SELECT COUNT(*)
  INTO vnConteo
  FROM USUARIO U
  INNER JOIN PERSONA P
    ON P.ID_PERSONA=U.ID_PERSONA
  WHERE pcorreo=CORREO;

  IF vnConteo=0 THEN
    mensaje:='No existe usuario: '|| pcorreo;
    RETURN 0;
  END IF;

  SELECT COUNT(*)
  INTO vnConteo
  FROM USUARIO U
  INNER JOIN PERSONA P
    ON P.ID_PERSONA=U.ID_PERSONA
  WHERE CONTRASENA = pcontrasena AND pcorreo=CORREO;
  IF vnConteo=0 THEN
    mensaje:='Contrasena de usuario es incorrecta: '|| pcorreo;
    RETURN 0;
  END IF;
  RETURN 1;
END;

/


CREATE OR REPLACE FUNCTION FN_EstadisticaConsulta (
	pIdCentro IN INT,
	Mensaje OUT VARCHAR,
	Resultado OUT SMALLINT			

)RETURN DOUBLE
AS
------DECLARE-------
vnConteo NUMBER;
estConsulta DOUBLE;
BEGIN
	Mensaje:='';
	Resultado:=0;
---------VALIDACION DE CAMPOS---------
IF pIdCentro= '' OR pIdCentro IS NULL THEN
	Mensaje:= Mensaje||'pIdCentro, ';
END IF;

IF Mensaje'' OR Mensaje IS NOT NULL THEN
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
FROM vw_consultasDiarias vw_con 
WHERE vw_con.id_centro_medico=pIdCentro;

Mensaje:='consulta realizada con éxito'
Resultado:=1;
RETURN estConsulta;
END;
/


CREATE OR REPLACE FUNCTION FN_EstadisticaEmergencias(
	pidCentro IN INT,
	mensaje OOUT VARCHAR,
	resultado SMALLINT
)RETURN DOUBLE
AS
vnConteo NUMBER;
estEmergencia DOUBLE;
----------VERIFICACION DE LOS CAMPOS-----------
IF pidCentro='' OR pidCentro IS NULL THEN
	mensaje:= mensaje|| 'pidCentro: ';
END IF;

IF mensaje<>'' OR mensaje IS NOT NULL THEN
	mensaje:= 'Campos requeridos: '||mensaje;
RETURN -1;
END IF;
-----------------CUERPO DE LA FN----------------------------
SELECT COUNT(*) 
INTO vnConteo
FROM CENTROMEDICO
WHERE id_centro_medico=pidCentro;

IF vnConteo=0 THEN
mensaje:='El centro medico con id: '||  vnConteo ||'no existe';
RETURN -1;
END IF:

SELECT COUNT(*)
FROM vw_emergenciasXhoy
WHERE id_centro_medico=pidCentro;

Mensaje:='consulta realizada con éxito'
Resultado:=1;
RETURN estEmergencia;
END;

/


