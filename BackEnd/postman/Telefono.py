import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Telefono'
data={
  'accion':'agregarTelefonoPersona',
  'idPersona': None,
  'idPais': None,
  'telefono': None,
  'idTipoTelefono': None,
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'listarTipoTelefono',
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'buscarPorPersona',
  'pNombre': None,
  'noIdentidad': None,
  'pApellido': None,
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'listarPorCentroMedico',
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'listarPorPersona',
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'actualizarTipoTelefono',
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'agregarTipoTelefono',
  'tipoTelefono': None,
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'agregarTelefonoCentro',
  'idPais': None,
  'idCentroMedico': None,
  'telefono': None,
  'idTipoTelefono': None,
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'eliminarDePersona',
  'idPersona': None,
  'idTelefono': None,
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'eliminarDeCentro',
  'idTelefono': None,
  'idCentroMedico': None,
}
print postear(data,url)
print

url='Telefono'
data={
  'accion':'buscarPorCentro',
  'idCentroMedico': None,
}
print postear(data,url)
print
