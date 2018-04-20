CREATE OR REPLACE PROCEDURE PL_CrearMedico(
  pNombre IN VARCHAR
  ,sNombre IN VARCHAR
  ,pApellido IN VARCHAR
  ,sApellido IN VARCHAR
  ,direccion IN VARCHAR
  ,sexo IN VARCHAR
  ,noIdentidad IN VARCHAR
  ,idPais IN INT
  ,idEspecialidad IN VARCHAR
  ,noColegiacion IN VARCHAR
  ,correo IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF pNombre = '' OR pNombre IS NULL THEN
    mensaje:= mensaje || 'pNombre, ';
  END IF;
  IF sNombre = '' OR sNombre IS NULL THEN
    mensaje:= mensaje || 'sNombre, ';
  END IF;
  IF pApellido = '' OR pApellido IS NULL THEN
    mensaje:= mensaje || 'pApellido, ';
  END IF;
  IF sApellido = '' OR sApellido IS NULL THEN
    mensaje:= mensaje || 'sApellido, ';
  END IF;
  IF direccion = '' OR direccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF sexo = '' OR sexo IS NULL THEN
    mensaje:= mensaje || 'sexo, ';
  END IF;
  IF noIdentidad = '' OR noIdentidad IS NULL THEN
    mensaje:= mensaje || 'noIdentidad, ';
  END IF;
  IF idPais = '' OR idPais IS NULL THEN
    mensaje:= mensaje || 'idPais, ';
  END IF;
  IF idEspecialidad = '' OR idEspecialidad IS NULL THEN
    mensaje:= mensaje || 'idEspecialidad, ';
  END IF;
  IF noColegiacion = '' OR noColegiacion IS NULL THEN
    mensaje:= mensaje || 'noColegiacion, ';
  END IF;
  IF correo = '' OR correo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;