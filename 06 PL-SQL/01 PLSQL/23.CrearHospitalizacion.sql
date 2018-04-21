CREATE OR REPLACE PROCEDURE PL_CrearHospitalizacion(
  observacion IN VARCHAR
  ,fechaHoraIngreso IN TIMESTAMP
  ,fechaHoraAlta IN TIMESTAMP
  ,idPiso IN INT
  ,cama IN VARCHAR
  ,idMedico IN INT
  ,idExpediente IN INT
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
  IF observacion = '' OR observacion IS NULL THEN
    mensaje:= mensaje || 'observacion, ';
  END IF;
  IF fechaHoraIngreso = '' OR fechaHoraIngreso IS NULL THEN
    mensaje:= mensaje || 'fechaHoraIngreso, ';
  END IF;
  IF fechaHoraAlta = '' OR fechaHoraAlta IS NULL THEN
    mensaje:= mensaje || 'fechaHoraAlta, ';
  END IF;
  IF idPiso = '' OR idPiso IS NULL THEN
    mensaje:= mensaje || 'idPiso, ';
  END IF;
  IF cama = '' OR cama IS NULL THEN
    mensaje:= mensaje || 'cama, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF idExpediente = '' OR idExpediente IS NULL THEN
    mensaje:= mensaje || 'idExpediente, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/
SELECT COUNT(*) INTO vnConteo
  FROM PISO
  WHERE idPiso=ID_PISO;
  IF vnConteo=0 THEN
    mensaje:='el id: '|| idPiso || 'no esta registrado';
    RETURN ;
  END IF;

  SELECT COUNT(*) INTO vnConteo
    FROM MEDICO
    WHERE idMedico= ID_MEDICO;
  IF vnConteo=0 THEN
    mensaje:='el medico con el id: '|| idMedico ||'no existe';
    RETURN ;
  END IF;

  SELECT COUNT(*) INTO vnConteo
    FROM EXPEDIENTE
      WHERE idExpediente= ID_EXPEDIENTE;
  IF vnConteo=0 THEN
    mensaje:='No existe registro con el expediente ' || idExpediente;
    RETURN;
  END IF;

    INSERT INTO HOSPITALIZACION(

      OBSERVACION,
      FECHA_HORA_INGRESO,

      ID_PISO,
      CAMA,
      ID_MEDICO,
      ID_EXPEDIENTE
    )VALUES (

      observacion,
      to_date(fechaHoraIngreso),

      idPiso,
      cama,
      idMedico,
      idExpediente
    );
    COMMIT ;
  mensaje:='insercion realizada correctamente';
  resultado:=1;
END;