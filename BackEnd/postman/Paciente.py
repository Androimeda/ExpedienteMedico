import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Paciente'
data={
  'accion':'crear',
  'idTipoSangre': None,
  'idPais': None,
  'noIdentidad': None,
  'pNombre': None,
  'idAscendencia': None,
  'sNombre': None,
  'sApellido': None,
  'idEstadoCivil': None,
  'direccion': None,
  'correo': None,
  'idOcupacion': None,
  'idEscolaridad': None,
  'pApellido': None,
  'sexo': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'agregarNatalidad',
  'idMadre': None,
  'ordenPartoMultiple': None,
  'idPadre': None,
  'idExpediente': None,
  'idCentroMedico': None,
  'fechaHora': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'buscarPorApellido',
  'sApellido': None,
  'pApellido': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'obtenerNumeroExpediente',
  'idPersona': None,
  'idPaciente': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'agregarDefuncion',
  'observacionCausa': None,
  'idExpediente': None,
  'fechaHora': None,
}
print postear(data,url)
print

url='Paciente'
data={
  'accion':'buscarPorNoIdentidad',
  'noIdentidad': None,
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
  'direccion': None,
  'idOcupacion': None,
  'idPaciente': None,
  'idEstadoCivil': None,
  'correo': None,
  'idEscolaridad': None,
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
