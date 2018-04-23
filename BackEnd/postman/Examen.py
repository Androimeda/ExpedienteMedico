import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Examen'
data={
  'accion':'crear',
  'idCentroMedico': None,
  'fecha': None,
  'urlDocumento': None,
  'idExpediente': None,
  'observacion': None,
  'idTipo': None,
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'listarPorTipo',
  'idTipo': None,
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'listarPorCentro',
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'listarTodos',
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'actualizarTipoExamen',
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'actualizar',
  'idTipo': None,
  'idCentroMedico': None,
  'fecha': None,
  'urlDocumento': None,
  'idExpediente': None,
  'observacion': None,
  'idExamen': None,
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'agregarTipoExamen',
}
print postear(data,url)
print

url='Examen'
data={
  'accion':'listarTipoExamen',
}
print postear(data,url)
print
