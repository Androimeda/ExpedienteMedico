CREATE OR REPLACE PROCEDURE PL_AgregarCentro(
  idCentroMedico IN INT
  ,telefono IN VARCHAR
  ,idTipoTelefono IN INT
  ,idPais IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idCentroMedico = '' OR idCentroMedico IS NULL THEN
    mensaje:= mensaje || 'idCentroMedico, ';
  END IF;
  IF telefono = '' OR telefono IS NULL THEN
    mensaje:= mensaje || 'telefono, ';
  END IF;
  IF idTipoTelefono = '' OR idTipoTelefono IS NULL THEN
    mensaje:= mensaje || 'idTipoTelefono, ';
  END IF;
  IF idPais = '' OR idPais IS NULL THEN
    mensaje:= mensaje || 'idPais, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;