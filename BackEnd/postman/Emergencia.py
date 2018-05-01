import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Emergencia'
data={
  'accion':'crear',
  'observacion': None,
  'fechaHoraAtencion': None,
  'idExpediente': None,
  'idMedico': None,
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'listarPorHoy',
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'listarPorCentroFecha',
  'idCentroMedico': None,
  'fechaHoraAtencion': None,
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'listarPorMedico',
  'idMedico': None,
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'actualizar',
  'idCentroMedico': None,
  'idIngreso': None,
  'idMedico': None,
  'idAtencion': None,
  'idExpediente': None,
  'observacion': None,
  'fechaHoraAtencion': None,
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'listarPorCentroMedico',
  'idCentroMedico': None,
  'nombreCentro': None,
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'listarPorMedicoFecha',
  'fechaHoraAtencion': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Emergencia'
data={
  'accion':'eliminar',
}
print postear(data,url)
print
