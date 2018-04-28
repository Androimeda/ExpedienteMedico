CREATE OR REPLACE PROCEDURE PL_ActualizarMedico(
  idMedico IN INT
  ,pdireccion IN VARCHAR
  ,idEspecialidad IN VARCHAR
  ,noColegiacion IN VARCHAR
  ,pcorreo IN VARCHAR
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
  temMensaje VARCHAR(2000);
vnConteo NUMBER;
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF pdireccion = '' OR pdireccion IS NULL THEN
    mensaje:= mensaje || 'direccion, ';
  END IF;
  IF idEspecialidad = '' OR idEspecialidad IS NULL THEN
    mensaje:= mensaje || 'idEspecialidad, ';
  END IF;
  IF noColegiacion = '' OR noColegiacion IS NULL THEN
    mensaje:= mensaje || 'noColegiacion, ';
  END IF;
  IF pcorreo = '' OR pcorreo IS NULL THEN
    mensaje:= mensaje || 'correo, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/


SELECT COUNT(*) INTO vnConteo
  FROM MEDICO
  WHERE idMedico=ID_MEDICO;
IF vnConteo=0 THEN
  mensaje:='El medico con registro: '|| idMedico||'no existe';
  RETURN ;
END IF;
SELECT COUNT(*) INTO vnConteo
  FROM  ESPECIALIDAD
  WHERE  idEspecialidad=ID_ESPECIALIDAD;
IF vnConteo=0 THEN
  mensaje:='La especialidad: '|| idEspecialidad||'no esta registrada';
  RETURN;
END IF;
  UPDATE MEDICO
    SET
      NO_COLEGIACION=noColegiacion,
      ID_ESPECIALIDAD=idEspecialidad
    WHERE
      idMedico=ID_MEDICO;
  UPDATE PERSONA
      SET
        DIRECCION=pdireccion,
        CORREO=pcorreo
      WHERE
        ID_PERSONA= (
          SELECT ID_PERSONA
            FROM MEDICO M
            WHERE  idMedico= M.ID_MEDICO
        ) ;
  COMMIT;
  mensaje:='Actualizada satisfactoriamente';
  resultado:=1;


END;
/