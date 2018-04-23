import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='CentroMedico'
data={
  'accion':'crear',
  'nombre': None,
  'idTipoCentro': None,
  'direccion': None,
}
print postear(data,url)
print

url='CentroMedico'
data={
  'accion':'listarTipos',
}
print postear(data,url)
print

url='CentroMedico'
data={
  'accion':'listarTodos',
}
print postear(data,url)
print

url='CentroMedico'
data={
  'accion':'actualizar',
  'pnombre': None,
  'idTipoCentro': None,
  'idCentroMedico': None,
  'pdireccion': None,
}
print postear(data,url)
print

url='CentroMedico'
data={
  'accion':'listarPorTipo',
  'descripcion': None,
  'idTipoCentro': None,
}
print postear(data,url)
print
