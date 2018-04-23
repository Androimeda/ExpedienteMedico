









<?php
$query=sprintf("
  SELECT  * 
  FROM vistaAmbulancia V 
  WHERE  v.ID_CENTRO_MEDICO=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM vistaAmbulancia v 
   WHERE v.ID_AMBULANCIA=%s OR v.PLACA='%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM vistaAmbulancia v 
   WHERE v.NOMBRE LIKE '%s' OR V.ID_CENTRO_MEDICO=%s 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   DELETE 
   FROM AMBULANCIA 
   WHERE ID_AMBULANCIA =%s
   
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  SELECT  * 
  FROM vistaAPH 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM vistaAPH v 
   WHERE v.ID_EXPEDIENTE =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM vistaAPH V 
   WHERE V.PLACA= '%s'
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM vistaAPH V 
   WHERE   V.NOMBRE='%s' OR V.ID_CENTRO_MEDICO=%s 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM vistaAPH V 
   WHERE   V.ID_PARAMEDICO=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   DELETE 
   FROM ATENCIONPREHOSPITALARIA 
   WHERE ID_ATENCION =%s
   
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  SELECT  * 
  FROM vistaCentroMedico 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  *  
   FROM vistaCentroMedico V  
   WHERE V.DESCRIPCION='%s' OR V.ID_TIPO_CENTRO=%s
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  SELECT  * 
  FROM VistaCirugia 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM VistaCirugia V 
   WHERE  V.ID_EXPEDIENTE=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM Vistacirugia V 
   WHERE  V.ID_MEDICO =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM Vistacirugia V 
   WHERE  V.ID_MEDICO =%s AND V.FECHA_HORA= TO_DATE('27/02/18') 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT * 
   FROM Vistacirugia V 
   WHERE V.FECHA_HORA= SYSDATE
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT* 
   FROM Vistacirugia V 
   WHERE V.ID_CENTRO_MEDICO=%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT* 
   FROM Vistacirugia V 
   WHERE V.ID_CENTRO_MEDICO=%s AND V.FECHA_HORA= TO_DATE ('27/02/18') 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   DELETE 
   FROM CIRUGIA 
   WHERE ID_CIRUGIA =%s
   
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   SELECT  * 
   FROM VistaConsultaExterna 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaConsultaExterna V 
    WHERE  V.ID_EXPEDIENTE=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT* 
     FROM VistaConsultaExterna V 
     WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE LIKE '%s'
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT * 
    FROM VistaConsultaExterna V 
    WHERE V.FECHA_HORA= SYSDATE
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaConsultaExterna V 
    WHERE  V.ID_MEDICO =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT  * 
   FROM VistaConsultaExterna V  
   WHERE  V.ID_CONSULTORIO=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT* 
    FROM VistaConsultaExterna V 
    WHERE v.ID_CENTRO_MEDICO=%s AND v.FECHA_HORA= TO_DATE ('27/02/18') 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    DELETE 
    FROM CONSULTAEXTERNA 
    WHERE ID_CONSULTA =%s
    
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   SELECT  * 
   FROM VistaConsultorio 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT *  
    FROM VistaConsultorio V  
    WHERE V.ID_PISO=%s  
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT* 
   FROM VistaConsultorio V 
   WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE LIKE '%s'
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaConsultorio V 
    WHERE  V.ID_MEDICO =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   SELECT  * 
   FROM VistaEdificio 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT* 
    FROM VistaEdificio V 
    WHERE V.ID_CENTRO_MEDICO=%s OR V.NOMBRE='%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT * 
    FROM VistaPiso v 
    WHERE V.ID_PISO=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   SELECT  * 
   FROM VistaEmergencia 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT* 
     FROM VistaEmergencia V 
     WHERE V.ID_CENTRO_MEDICO=%s OR V.centro_medico LIKE '%s'
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT  * 
     FROM VistaEmergencia V 
     WHERE  V.ID_EXPEDIENTE=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaEmergencia V 
    WHERE  V.ID_MEDICO =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT * 
    FROM VistaEmergencia V 
    WHERE V.FECHA_HORA_ATENCION= SYSDATE
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT* 
     FROM VistaEmergencia V 
     WHERE v.ID_CENTRO_MEDICO=%s AND v.FECHA_HORA_ATENCION =  TO_DATE ('27/02/18', 'dd/mm/yyyy') 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT* 
     FROM VistaEmergencia V 
     WHERE v.ID_MEDICO=%s AND v.FECHA_HORA_ATENCION= TO_DATE ('27/02/18', 'dd/mm/yyyy') 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    /*SELECT  * 
    FROM VistaEmergencia V  
    WHERE  V.ID_CONSULTORIO=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
  */   DELETE 
  FROM EMERGENCIA 
  WHERE ID_INGRESO =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   SELECT  * 
   FROM VistaEnfermedad ORDER BY tipo_enfermedad, enfermedad 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT * 
   FROM VistaEnfermedadPaciente V 
   WHERE V.ID_TIPO_ENFERMEDAD=%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaEnfermedadPaciente V 
    WHERE  V.ID_EXPEDIENTE=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     DELETE 
     FROM ENFERMEDAD 
     WHERE ID_ENFERMEDAD =%s
     
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   SELECT  * 
   FROM VistaExamen 
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
   SELECT * 
   FROM VistaExamen V 
   WHERE V.ID_TIPO=%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT * 
    FROM VistaExamen V 
    WHERE V.ID_CENTRO_MEDICO=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaExamen V 
    WHERE  V.ID_EXPEDIENTE=%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     DELETE 
     FROM EXAMEN 
     WHERE ID_EXAMEN =%s
     
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   SELECT  * 
   FROM VistaHojaTrabajoSocial h 
   WHERE  h.id_expediente =%s  AND h.id_centro_medico =%s 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaHojaTrabajoSocial h 
    WHERE  h.id_expediente =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    DELETE 
    FROM HOJATRABAJOSOCIAL 
    WHERE ID_TS =%s
    
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  SELECT  * 
  FROM VISTAHOSPITALIZACIONES v 
  WHERE v.ID_CENTRO_MEDICO =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAHOSPITALIZACIONES v 
    WHERE v.ID_EXPEDIENTE =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAHOSPITALIZACIONES v 
    WHERE  v.ID_CENTRO_MEDICO =%s  AND v.ID_MEDICO =%s 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT  * 
     FROM VISTAHOSPITALIZACIONES v 
     WHERE v.ID_PISO =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAHOSPITALIZACIONES v 
    WHERE  EXTRACT(DAY 
    FROM v.FECHA_HORA_INGRESO) = EXTRACT(DAY 
    FROM TO_DATE('12/02/2011', 'dd/mm/yyyy'))  AND EXTRACT(MONTH 
    FROM v.FECHA_HORA_INGRESO) = EXTRACT(MONTH 
    FROM TO_DATE('12/02/2011', 'dd/mm/yyyy'))  AND EXTRACT(YEAR 
    FROM v.FECHA_HORA_INGRESO) = EXTRACT(YEAR 
    FROM TO_DATE('12/02/2011', 'dd/mm/yyyy'))  AND v.ID_CENTRO_MEDICO =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     DELETE 
     FROM HOSPITALIZACION 
     WHERE ID_INGRESO =%s
     
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  SELECT DISTINCT  e.ID_CENTRO_MEDICO,  v.* 
  FROM VISTAMEDICO v INNER JOIN MEDICOCONSULTORIO mc  ON mc.ID_MEDICO = v.ID_MEDICO INNER JOIN CONSULTORIO c  ON c.ID_CONSULTORIO = mc.ID_CONSULTORIO INNER JOIN PISO p  ON p.ID_PISO = c.ID_PISO INNER JOIN EDIFICIO e  ON e.ID_EDIFICIO = p.ID_PISO 
  WHERE  e.ID_CENTRO_MEDICO =%s ORDER BY v.ESPECIALIDAD 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAMEDICO v 
    WHERE v.ID_MEDICO =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAMEDICO v 
    WHERE  v.P_NOMBRE = '%s'  OR v.S_NOMBRE = '%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAMEDICO v 
    WHERE  v.P_APELLIDO = '%s'  OR v.S_APELLIDO = '%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAMEDICO v 
    WHERE  v.NO_IDENTIDAD = '%s' 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  SELECT  * 
  FROM VISTAPACIENTE v 
  WHERE v.ID_PACIENTE =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAPACIENTE
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    DELETE 
    FROM PACIENTE 
    WHERE ID_PACIENTE =%s
    
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAPACIENTE v 
    WHERE  v.P_NOMBRE = '%s'  OR v.S_NOMBRE = '%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAPACIENTE v 
    WHERE  v.P_APELLIDO = '%s'  OR v.S_APELLIDO = '%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VISTAPACIENTE v 
    WHERE  v.NO_IDENTIDAD =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  v.ID_EXPEDIENTE 
    FROM VISTAPACIENTE v 
    WHERE  v.ID_PERSONA =%s  OR v.ID_PACIENTE =%s 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
   DELETE 
   FROM PARAMEDICO 
   WHERE ID_PARAMEDICO =%s
   
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaParamedico v 
    WHERE v.ID_PARAMEDICO =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT  v.* 
     FROM VistaParamedico v INNER JOIN ATENCIONPREHOSPITALARIA a  ON a.ID_PARAMEDICO = v.ID_PARAMEDICO INNER JOIN AMBULANCIA amb  ON a.ID_AMBULANCIA = amb.ID_AMBULANCIA INNER JOIN CENTROMEDICO c  ON amb.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO 
     WHERE c.ID_CENTRO_MEDICO =%s 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaParamedico v 
    WHERE  v.P_NOMBRE = '%s'  OR v.S_NOMBRE = '%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaParamedico v 
    WHERE  v.P_APELLIDO = '%s'  OR v.S_APELLIDO = '%s' 
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaParamedico v 
    WHERE  v.NO_IDENTIDAD = '%s' 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  DELETE 
  FROM REFERENCIA 
  WHERE ID_REFERENCIA =%s
  
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaReferencias v 
    WHERE v.ID_PACIENTE=%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaReferencias v 
    WHERE v.id_centro_medico_remite=%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaReferencias v 
    WHERE v.id_centro_medico_recibe=%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VistaReferencias v 
    WHERE v.ID_MEDICO =%s AND v.id_centro_medico_remite=%s
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  SELECT p.NO_IDENTIDAD ,p.p_nombre || ' ' || p.s_nombre || ' ' || p.p_apellido || ' ' || p.s_apellido as nombre ,v.* 
  FROM VistaTelefonoPersona v INNER JOIN PERSONA p  ON v.ID_PERSONA = p.ID_PERSONA 
  WHERE v.ID_PERSONA =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT t.DESCRIPCION as tipo_centro_medico ,c.NOMBRE as centro_medico ,v.* 
    FROM VistaTelefonoCentroMedico v INNER JOIN CENTROMEDICO c  ON v.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO INNER JOIN TIPOCENTRO t  ON c.ID_TIPO_CENTRO = t.ID_TIPO_CENTRO 
    WHERE v.ID_CENTRO_MEDICO =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT p.NO_IDENTIDAD ,p.p_nombre || ' ' || p.s_nombre || ' ' || p.p_apellido || ' ' || p.s_apellido as nombre ,v.* 
     FROM VistaTelefonoPersona v INNER JOIN PERSONA p  ON v.ID_PERSONA = p.ID_PERSONA 
     WHERE  p.NO_IDENTIDAD = '%s'  OR LOWER(p.P_NOMBRE) LIKE '%s'  OR LOWER(p.P_APELLIDO) LIKE '%s' 
"
  ,$this->
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT t.DESCRIPCION as tipo_centro_medico ,c.NOMBRE as centro_medico ,v.* 
     FROM VistaTelefonoCentroMedico v INNER JOIN CENTROMEDICO c  ON v.ID_CENTRO_MEDICO = c.ID_CENTRO_MEDICO INNER JOIN TIPOCENTRO t  ON c.ID_TIPO_CENTRO = t.ID_TIPO_CENTRO 
     WHERE  LOWER(c.NOMBRE) LIKE '%s' 
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    DELETE 
    FROM TELEFONOPERSONA 
    WHERE ID_PERSONA =%s AND ID_TELEFONO =%s
    
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    DELETE 
    FROM TELEFONOCENTROMEDICO 
    WHERE ID_CENTRO_MEDICO =%s AND ID_TELEFONO =%s
    
"
  ,$this->
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    INSERT 
    INTO TIPOTELEFONO (TIPO_TELEFONO) 
    VALUES ('%s')
    
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM TIPOTELEFONO
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>












<?php
$query=sprintf("
  INSERT 
  INTO TIPOTRATAMIENTO (TIPO_TRATAMIENTO) 
  VALUES ('%s')
  
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM TIPOTRATAMIENTO
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    INSERT 
    INTO VIASUMINISTRO (VIA_SUMINISTRO) 
    VALUES ('%s')

"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT  * 
    FROM VIASUMINISTRO
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
     SELECT  * 
     FROM VIstaTratamiento
"
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>











<?php
$query=sprintf("
    SELECT e.ID_PACIENTE ,c.ID_CONSULTA ,v.* 
    FROM TRATAMIENTOCONSULTA tc INNER JOIN CONSULTAEXTERNA c  ON tc.ID_CONSULTA = c.ID_CONSULTA INNER JOIN EXPEDIENTE e  ON c.ID_EXPEDIENTE = e.ID_EXPEDIENTE INNER JOIN VIstaTratamiento v  ON v.ID_TRATAMIENTO = tc.ID_TRATAMIENTO 
    WHERE e.ID_PACIENTE =%s
"
  ,$this->
);
$resultado = $conexion->query($query);
$respuesta = $conexion->filas($resultado);
return json_encode($respuesta);
?>


