import requests
def postear(data, url):
    return requests.post('http://127.0.0.1/syme/BackEnd/services/'+url+'.php', data=data).content

url='Tratamiento'
data={
  'accion':'crear',
  'dosis': None,
  'idTipoTratamiento': None,
  'intervaloTiempo': None,
  'fechaInicio': None,
  'idViaSuministro': None,
  'duracionTratamiento': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'agregarTipoTratamiento',
  'tipoTratamiento': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'listarPorPaciente',
  'idPaciente': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'listarTipoTratamiento',
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizarReceta',
  'idTratamiento': None,
  'idConsulta': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'agregarViaSuministro',
  'viaSuministro': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'listarViaSuministro',
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'recetar',
  'idTratamiento': None,
  'idConsulta': None,
  'idMedico': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizarViaSuministro',
  'viaSuministro': None,
  'idViaSuministro': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizarTipoTratamiento',
  'idTipoTratamiento': None,
  'tipoTratamiento': None,
}
print postear(data,url)
print

url='Tratamiento'
data={
  'accion':'actualizar',
  'dosis': None,
  'idTipoTratamiento': None,
  'intervaloTiempo': None,
  'fechaInicio': None,
  'idViaSuministro': None,
  'idTratamiento': None,
  'duracionTratamiento': None,
}
print postear(data,url)
print
