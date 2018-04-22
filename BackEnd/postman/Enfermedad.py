import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Enfermedad'
data={
  'accion':'crear',
  'enfermedad': None,
  'idTipoEnfermedad': None,
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'agregarTipoEnfermedad',
  'descripcion': None,
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'listarPorTipo',
  'idTipoEnfermedad': None,
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'quitarDiagnostico',
  'idEnfermedad': None,
  'idExpediente': None,
  'idConsulta': None,
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'actualizarTipoEnfermedad',
  'descripcion': None,
  'idTipoEnfermedad': None,
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'listarTodos',
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'actualizar',
  'idEnfermedad': None,
  'penfermedad': None,
  'idTipoEnfermedad': None,
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'listarTipoEnfermedad',
}
print postear(data,url)
print

url='Enfermedad'
data={
  'accion':'diagnosticarEnfermedad',
  'idEnfermedad': None,
  'idMedico': None,
  'fechaDiagnostico': None,
  'idExpediente': None,
  'idConsulta': None,
}
print postear(data,url)
print
