<?php
require_once("conexion.php");

class modificacion{
	 
    private $sql=NULL;
    private $result=NULL;
		
	public function InsertarDatosDeVentas($cadena){
	$db = new conexion;
		$this->sql="INSERT INTO tbl_desgVentas VALUES()";
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}
	}
	
	public function InsertarDatosNuevoCliente($table,$datosCliente){
	$db = new conexion;
		$this->sql=$db->getQueryInsertForm($table,$datosCliente);
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return 1;
			
		}
		else{
			return $this->result;
		}
	}	
	
}
?>
	
