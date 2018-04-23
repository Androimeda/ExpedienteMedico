CREATE OR REPLACE PROCEDURE PL_ActualizarHospitalizacion(
  idIngreso IN INT
  ,pobservacion IN VARCHAR
  ,fechaHoraIngreso IN TIMESTAMP
  ,idPiso IN INT
  ,pcama IN VARCHAR
  ,idMedico IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  contador INT;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idIngreso = '' OR idIngreso IS NULL THEN
    mensaje:= mensaje || 'idIngreso, ';
  END IF;
  IF pobservacion = '' OR pobservacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF fechaHoraIngreso = '' OR fechaHoraIngreso IS NULL THEN
    mensaje:= mensaje || 'fechaHoraIngreso, ';
  END IF;
  IF idPiso = '' OR idPiso IS NULL THEN
    mensaje:= mensaje || 'idPiso, ';
  END IF;
  IF pcama = '' OR pcama IS NULL THEN
    mensaje:= mensaje || 'cama, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

  SELECT
    COUNT(*)
  INTO contador
  FROM HOSPITALIZACION
  WHERE ID_INGRESO = idIngreso
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de ingreso a Hospitalizacion ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM PISO
  WHERE ID_PISO = idPiso
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de piso ingresado';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM MEDICO
  WHERE ID_MEDICO = idMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe codigo de medico ingresado';
    RETURN;
  END IF;

  UPDATE HOSPITALIZACION
  SET
  OBSERVACION= pobservacion,
  FECHA_HORA_INGRESO= fechaHoraIngreso,
  ID_PISO= idPiso,
  CAMA= pcama,
  ID_MEDICO= idMedico
  WHERE ID_INGRESO = idIngreso;
  COMMIT;
  mensaje:='Actualizada satisfactoriamente';
  resultado:=1;
END;