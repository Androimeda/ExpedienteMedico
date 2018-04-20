CREATE OR REPLACE PROCEDURE PL_CrearConsultorio(
  idPiso INT undefined undefined
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE 	contador INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idPiso INT = '' OR idPiso INT IS NULL THEN
    mensaje:= mensaje || 'idPiso INT, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;