CREATE OR REPLACE PROCEDURE PL_CrearEdificio(
  nombre IN VARCHAR
  ,idCentroMedico IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF nombre = '' OR nombre IS NULL THEN
    mensaje:= mensaje || 'nombre, ';
  END IF;
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;