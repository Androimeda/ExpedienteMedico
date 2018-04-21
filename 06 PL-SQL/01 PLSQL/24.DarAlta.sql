CREATE OR REPLACE PROCEDURE PL_DarAlta(
  idIngreso IN INT
  ,fechaHoraAlta IN TIMESTAMP
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
temMensaje VARCHAR(2000);
vnConteo NUMBER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idIngreso = '' OR idIngreso IS NULL THEN
    mensaje:= mensaje || 'idIngreso, ';
  END IF;
  IF fechaHoraAlta = '' OR fechaHoraAlta IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAlta, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
  SELECT COUNT(*) INTO vnConteo
    FROM HOSPITALIZACION
      WHERE idIngreso=ID_INGRESO;
  IF vnConteo=0 THEN
    mensaje:='No existe la hospitalizacion :' || idIngreso;
    RETURN ;
  END IF;
  UPDATE HOSPITALIZACION
    SET
      FECHA_HORA_ALTA=fechaHoraAlta
    WHERE
      idIngreso=ID_INGRESO;
  COMMIT ;
  mensaje:='Se actualizo el registro con exito';
  resultado:=1;

END;