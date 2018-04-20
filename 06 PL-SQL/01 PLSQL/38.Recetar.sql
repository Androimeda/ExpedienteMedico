CREATE OR REPLACE PROCEDURE PL_Recetar(
  idTratamiento IN INT
  ,idConsulta IN INT
  ,idMedico IN INT
  ,mensaje OUT VARCHAR
  ,resultado OUT SMALLINT
)
IS
--DECLARE
BEGIN
  mensaje:='';
  resultado:=0;
/*----------------VALIDACION DE CAMPOS----------------*/
  IF idTratamiento = '' OR idTratamiento IS NULL THEN
    mensaje:= mensaje || 'idTratamiento, ';
  END IF;
  IF idConsulta = '' OR idConsulta IS NULL THEN
    mensaje:= mensaje || 'idConsulta, ';
  END IF;
  IF idMedico = '' OR idMedico IS NULL THEN
    mensaje:= mensaje || 'idMedico, ';
  END IF;
  IF mensaje<>'' OR mensaje IS NOT NULL THEN
    mensaje:='Campos requeridos: '||mensaje;
    RETURN;
  END IF;
/*---------------- CUERPO DEL PL----------------*/

END;