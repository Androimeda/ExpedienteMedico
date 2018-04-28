CREATE OR REPLACE PROCEDURE PL_AgregarCirugia(
  idIngreso IN INT
  ,idTipoCirugia IN INT
  ,idMedico IN INT
  ,fechaHora IN VARCHAR
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
  IF idIngreso = '' OR idIngreso IS NULL THEN
    mensaje:= mensaje || 'idIngreso, ';
  END IF;
  IF idTipoCirugia = '' OR idTipoCirugia IS NULL THEN
    mensaje:= mensaje || 'idTipoCirugia, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF fechaHora = '' OR fechaHora IS NULL THEN
    mensaje:= mensaje || 'fechaHora, ';
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
    mensaje:='No existe Paciente en Hospitalizacion';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM TIPOCIRUGIA
  WHERE ID_TIPO_CIRUGIA = idTipoCirugia
  ;
  IF contador=0 THEN
    mensaje:='No existe TipoCirugia';
    RETURN;
  END IF;

  SELECT
    COUNT(*)
  INTO contador
  FROM MEDICO
  WHERE ID_MEDICO = idMedico
  ;
  IF contador=0 THEN
    mensaje:='No existe Medico para enlazar cirugia';
    RETURN;
  END IF;

  INSERT INTO CIRUGIA
  (ID_INGRESO, ID_TIPO_CIRUGIA, ID_MEDICO, FECHA_HORA) VALUES
  (idIngreso, idTipoCirugia, idMedico, fechaHora);

  COMMIT;
  mensaje:='Registro insertado satisfactoriamente';
  resultado:=1;
END;
/