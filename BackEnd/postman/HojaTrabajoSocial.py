import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='HojaTrabajoSocial'
data={
  'accion':'crear',
  'descripcion': None,
  'idExpediente': None,
  'idCentroMedico': None,
}
print postear(data,url)
print

url='HojaTrabajoSocial'
data={
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print

url='HojaTrabajoSocial'
data={
  'accion':'listarTodos',
  'idCentroMedico': None,
}
print postear(data,url)
print

url='HojaTrabajoSocial'
data={
  'accion':'actualizar',
  'idTS': None,
  'descripcion': None,
  'idExpediente': None,
  'idCentroMedico': None,
}
print postear(data,url)
print
