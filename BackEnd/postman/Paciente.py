import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Paciente'
data={
  'accion':'crear',
  'pNombre': None,
  'sNombre': None,
  'pApellido': None,
  'sApellido': None,
  'direccion': None,
  'noIdentidad': None,
  'idPais': None,
  'sexo': None,
  'correo': None,
  'idTipoSangre': None,
  'idEscolaridad': None,
  'idOcupacion': None,
  'idEstadoCivil': None,
  'idAscendencia': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'buscarPorApellido',
  'pApellido': None,
  'sApellido': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'buscarPorNoIdentidad',
  'noIdentidad': None,
  'idPersona': None,
  'idPaciente': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'listarTodos',
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'actualizar',
  'idPaciente': None,
  'pdireccion': None,
  'pcorreo': None,
  'idEscolaridad': None,
  'idOcupacion': None,
  'idEstadoCivil': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'buscarPorNombre',
  'pNombre': None,
  'sNombre': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'listar',
  'idPaciente': None,
}
print postear(data,url)
print
