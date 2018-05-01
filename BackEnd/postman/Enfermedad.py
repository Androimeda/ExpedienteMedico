import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Enfermedad'
data={
  'accion':'crear',
  'idTipoEnfermedad': None,
  'enfermedad': None,
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
  'idConsulta': None,
  'idExpediente': None,
  'idEnfermedad': None,
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
  'idTipoEnfermedad': None,
  'penfermedad': None,
  'idEnfermedad': None,
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
  'idConsulta': None,
  'idEnfermedad': None,
}
print postear(data,url)
print
