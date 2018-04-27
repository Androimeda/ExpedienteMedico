CREATE OR REPLACE PROCEDURE PL_Login(
  pcorreo IN VARCHAR
  ,pcontrasena IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  coincide INT;
  cursorcito SYS_REFCURSOR ;

BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF pcorreo = '' OR pcorreo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF pcontrasena = '' OR pcontrasena IS NULL THEN
    mensaje:= mensaje || 'contrasena, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  coincide:= FN_VERIFICARUSUARIO(pcorreo,pcontrasena,mensaje);
  IF coincide=0 THEN
    resultado:=0;
    RETURN ;
  ELSE

  OPEN cursorcito FOR
    SELECT *
    FROM PERSONA P
    INNER JOIN USUARIO U
      ON P.ID_PERSONA=U.ID_PERSONA
    INNER JOIN CENTROMEDICO CM
      ON CM.ID_CENTRO_MEDICO=U.ID_CENTRO_MEDICO
    INNER JOIN TIPOCENTRO TP
      ON CM.ID_TIPO_CENTRO = TP.ID_TIPO_CENTRO
    INNER JOIN TIPOUSUARIO TU
      ON U.ID_TIPO_USUARIO = TU.ID_TIPO_USUARIO
    WHERE P.CORREO=pcorreo;
  END IF;
  mensaje:='MAZIZO PRRO';
  resultado:= 1;
END;