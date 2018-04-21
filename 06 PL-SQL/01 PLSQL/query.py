import re
import os
tab ="  "
head = "$query=sprintf(\""

buffer = ""
buffer+=head+"\n"
buffer+="\""+"\n"
buffer+=");"+"\n"
buffer+="$resultado = $conexion->query($query);"+"\n"
buffer+="$respuesta = $conexion->filas($resultado);"+"\n"
buffer+="return json_encode($respuesta);"+"\n"

print buffer