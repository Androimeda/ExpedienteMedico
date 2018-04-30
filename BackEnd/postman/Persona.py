import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Persona'
data={
  'accion':'listarOcupacion',
}
print postear(data,url)
print

url='Persona'
data={
  'accion':'listarAscendencia',
}
print postear(data,url)
print

url='Persona'
data={
  'accion':'buscarPorNoIdentidad',
  'noIdentidad': None,
}
print postear(data,url)
print

url='Persona'
data={
  'accion':'listarEstadoCivil',
}
print postear(data,url)
print

url='Persona'
data={
  'accion':'listarPais',
}
print postear(data,url)
print

url='Persona'
data={
  'accion':'listarTipoSangre',
}
print postear(data,url)
print

url='Persona'
data={
  'accion':'listarEscolaridad',
}
print postear(data,url)
print
