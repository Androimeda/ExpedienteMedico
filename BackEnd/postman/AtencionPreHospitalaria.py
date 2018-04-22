import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='AtencionPreHospitalaria'
data={
  'accion':'crear',
  'observacion': None,
  'idParamedico': None,
  'idAmbulancia': None,
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
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print

url='AtencionPreHospitalaria'
data={
  'accion':'actualizar',
  'idAtencion': None,
  'observacion': None,
  'fechaHoraAtencion': None,
  'idParamedico': None,
  'idAmbulancia': None,
  'idExpediente': None,
}
print postear(data,url)
print

url='AtencionPreHospitalaria'
data={
  'accion':'listarPorCentroMedico',
  'nombreCentro': None,
  'idCentroMedico': None,
}
print postear(data,url)
print
