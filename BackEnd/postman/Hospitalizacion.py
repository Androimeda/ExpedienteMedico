import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Hospitalizacion'
data={
  'accion':'crear',
  'idPiso': None,
  'idMedico': None,
  'fechaHoraAlta': None,
  'fechaHoraIngreso': None,
  'observacion': None,
  'idExpediente': None,
  'cama': None,
}
print postear(data,url)
print

url='Hospitalizacion'
data={
  'accion':'listarPorPiso',
  'idPiso': None,
}
print postear(data,url)
print

url='Hospitalizacion'
data={
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print

url='Hospitalizacion'
data={
  'accion':'listarPorMedico',
  'idCentroMedico': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Hospitalizacion'
data={
  'accion':'actualizar',
  'idPiso': None,
  'idIngreso': None,
  'idMedico': None,
  'fechaHoraIngreso': None,
  'observacion': None,
  'cama': None,
}
print postear(data,url)
print

url='Hospitalizacion'
data={
  'accion':'listarPorFecha',
  'idCentroMedico': None,
  'fechaHoraIngreso': None,
}
print postear(data,url)
print

url='Hospitalizacion'
data={
  'accion':'darAlta',
  'fechaHoraAlta': None,
  'idIngreso': None,
}
print postear(data,url)
print

url='Hospitalizacion'
data={
  'accion':'listarPorCentro',
  'idCentroMedico': None,
}
print postear(data,url)
print
