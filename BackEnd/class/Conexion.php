<?php
class Conexion{
	private $host;
	private $db;
	private $usuario;
	private $pass;
	private $link;
	private $do=false;

	public function __construct(
		$host = "localhost",
		$db = "XE",
		$usuario = "EXPEDIENTE",
		$pass = "asd.456",
		$link = null
	){
		$this->host = $host;
		$this->db = $db;
		$this->usuario = $usuario;
		$this->pass = $pass;
    // Conexion con Oracle a tráves de OCI8
    $this->link = oci_connect(
      $this->usuario,
      $this->pass,
      $this->host.'/'.$this->db
    );
    // Comprueba la conexion
    if (!$this->link) {
      $e = oci_error();
      echo "Error: ".$e["code"]."<br>";
      echo "Mensaje: ".$e["message"]."<br>";
    }else{
      $this->do=true;
    }
	}

	public function query($sql){
    if ($this->do) {
      $query = oci_parse($this->link, $sql);
      return $query;
    }else{
      return null;
    }
	}

  public function filas($query){
    oci_execute($query);
    $registros = [];
    if($this->do){
      while($registro = oci_fetch_array($query, OCI_ASSOC + OCI_RETURN_NULLS)){
        $registros[]=$registro;
      }
      oci_free_statement($query);
      return $registros;
    }else{
      return null;
    }
  }

  public function close(){
    oci_close($this->link);
  }
}
?>
