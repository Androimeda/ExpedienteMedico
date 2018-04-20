CREATE OR REPLACE PROCEDURE PL_ActualizarCentroMedico(
  idCentroMedico IN INTEGER
  ,pnombre IN VARCHAR
  ,pdireccion IN VARCHAR
  ,idTipoCentro IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INTEGER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF pnombre = '' OR pnombre IS NULL THEN
    mensaje:= mensaje || 'nombre, ';
  END IF;
  IF pdireccion = '' OR pdireccion IS NULL THEN
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
  SELECT
    COUNT(*)
  INTO contador
  FROM CENTROMEDICO
  WHERE ID_CENTRO_MEDICO = idCentroMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe idCentroMedico';
    RETURN;
  END IF;


  SELECT
    COUNT(*)
  INTO contador
  FROM TIPOCENTRO
  WHERE ID_TIPO_CENTRO = idTipoCentro
  ;
  IF contador=0 THEN
    mensaje:='No existe idTipoCentro';
    RETURN;
  END IF;

  UPDATE CENTROMEDICO
  SET NOMBRE= pnombre,
  DIRECCION= pdireccion,
  ID_TIPO_CENTRO= idTipoCentro
  WHERE ID_CENTRO_MEDICO= idCentroMedico
  ;
  COMMIT;
  mensaje:='Actualizada satisfactoriamente';
  resultado:=1;


END;