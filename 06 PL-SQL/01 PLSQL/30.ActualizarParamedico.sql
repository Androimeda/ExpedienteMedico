CREATE OR REPLACE PROCEDURE PL_ActualizarParamedico(
  direccion IN VARCHAR
  ,correo IN VARCHAR
  ,licencia IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF correo = '' OR correo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF licencia = '' OR licencia IS NULL THEN
    mensaje:= mensaje || 'licencia, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;