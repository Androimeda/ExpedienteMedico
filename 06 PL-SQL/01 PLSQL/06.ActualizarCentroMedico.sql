CREATE OR REPLACE PROCEDURE PL_ActualizarCentroMedico(
  idCentroMedico IN INTEGER
  ,nombre IN VARCHAR
  ,direccion IN VARCHAR
  ,idTipoCentro IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE 	contador INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF nombre = '' OR nombre IS NULL THEN
    mensaje:= mensaje || 'nombre, ';
  END IF;
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF idTipoCentro = '' OR idTipoCentro IS NULL THEN
    mensaje:= mensaje || 'idTipoCentro, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;