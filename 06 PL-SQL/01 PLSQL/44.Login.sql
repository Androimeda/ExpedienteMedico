CREATE OR REPLACE PROCEDURE PL_Login(
  pcorreo IN VARCHAR
  ,pcontrasena IN VARCHAR
  , datos OUT SYS_REFCURSOR
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
  OPEN datos FOR
    SELECT
      *
    FROM VISTAUSUARIO v
    WHERE v.CORREO=pcorreo;
  END IF;
  mensaje:='Identificado correctamente';
  resultado:= 1;
END;