import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Cirugia'
data={
  'accion':'listarPorPaciente',
  'idExpediente': None,
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'agregarCirugia',
  'idIngreso': 1,
  'idTipoCirugia': 1,
  'idMedico': 1,
  'fechaHora': '27/02/1992 18:00:00',
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'listarPorHoy',
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'listarTipoCirugia',
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'listarPorCentroFecha',
  'idCentroMedico': None,
  'fechaHora': None,
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'actualizarTipoCirugia',
  'descripcion': None,
  'idPiso': None,
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'listarPorMedico',
  'idMedico': None,
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'listarPorMedicoFecha',
  'idMedico': None,
  'fechaHora': None,
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'listarPorCentroMedico',
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Cirugia'
data={
  'accion':'agregarTipoCirugia',
  'descripcion': None,
}
print postear(data,url)
print
