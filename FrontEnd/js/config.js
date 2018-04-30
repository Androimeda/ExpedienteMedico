const CONST_SITIO_URL = 'http://127.0.0.1/hope/Backend'


function parseFecha(fecha, hora){
	return fecha.substr(-2)+"/"+fecha.substr(-5,2)+"/"+fecha.substr(0,4) + " " + hora + ":00";
}
