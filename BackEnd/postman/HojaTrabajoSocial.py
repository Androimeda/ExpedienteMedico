import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='HojaTrabajoSocial'
data={
  'accion':'crear',
  'descripcion': None,
  'idCentroMedico': None,
  'idExpediente': None,
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
  'descripcion': None,
  'idExpediente': None,
  'idCentroMedico': None,
  'idTS': None,
}
print postear(data,url)
print
