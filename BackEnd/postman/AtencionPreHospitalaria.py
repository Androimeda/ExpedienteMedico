import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='AtencionPreHospitalaria'
data={
  'accion':'crear',
  'observacion': None,
  'idAmbulancia': None,
  'idParamedico': None,
  'idExpediente': None,
}
print postear(data,url)
print

url='AtencionPreHospitalaria'
data={
  'accion':'listarPorParamedico',
}
print postear(data,url)
print

url='AtencionPreHospitalaria'
data={
  'accion':'listarPorCentroFecha',
  'idCentroMedico': None,
  'fechaHoraAtencion': None,
}
print postear(data,url)
print

url='AtencionPreHospitalaria'
data={
  'accion':'actualizar',
  'idAmbulancia': None,
  'observacion': None,
  'idExpediente': None,
  'idAtencion': None,
  'fechaHoraAtencion': None,
  'idParamedico': None,
}
print postear(data,url)
print

url='AtencionPreHospitalaria'
data={
  'accion':'listarPorCentroMedico',
  'idCentroMedico': None,
  'nombreCentro': None,
}
print postear(data,url)
print

url='AtencionPreHospitalaria'
data={
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print
