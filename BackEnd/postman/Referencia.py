import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Referencia'
data={
  'accion':'crear',
  'descripcion': None,
  'idCentroMedicoRecibe': None,
  'idExpediente': None,
  'idCentroMedicoRemite': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'listarPorPaciente',
  'idPaciente': None,
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'listarRecibidas',
  'idCentroMedicoRecibe': None,
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'listarPorCentroRemite',
  'idCentroMedicoRemite': None,
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'listarPorMedico',
  'idCentroMedicoRemite': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'listarTodos',
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'actualizar',
  'idCentroMedicoRecibe': None,
  'idMedico': None,
  'idReferencia': None,
  'idExpediente': None,
  'idCentroMedicoRemite': None,
  'descripcion': None,
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'eliminar',
}
print postear(data,url)
print

url='Referencia'
data={
  'accion':'listar',
}
print postear(data,url)
print
