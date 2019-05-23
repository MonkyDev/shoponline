<?php
require_once("../clases/conexion.php");
$db = new conexion;

class consultas{
	 
    private $sql=NULL;
    private $result=NULL;
	private $reg=NULL;
	private $row=NULL;
	
	public function ConsultaDeProductosInicioPage(){
	$db = new conexion;
		$this->sql="SELECT * FROM cat_categorias";
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}
	}
	
	public function ConsultaDeProductosPorCategorias($categoria){
	$db = new conexion;
		$this->sql="SELECT * FROM tbl_productos 
		INNER JOIN cat_categorias ON pk_categoria=fk_categoria 
		WHERE fk_categoria=".$categoria;
		
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}
	}
	
	public function ConsultaDeVerProductoAndAgregar($pk_producto){
	$db = new conexion;
		$this->sql="SELECT * FROM tbl_productos 
		INNER JOIN cat_categorias ON pk_categoria=fk_categoria 
		WHERE pk_producto=".$pk_producto;
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}
	}
	public function ObtieneElNumeroDelSiguienteAregistrar($table){
	$db = new conexion;
		$this->result=$db->genIndex($table,0);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}	
	}
	public function ObtieneLosDatosDelUsuarioForShopping($usr_nick){
		$db= new conexion;
		$this->sql="SELECT * FROM tbl_users INNER JOIN cat_clientes ON pk_cliente=pk_user WHERE nick='$usr_nick'";
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}
	}
	public function ObtieneLosDatosDelaCompraParaTicket($pk_venta){
		$db= new conexion;
		$this->sql="SELECT *, DATE_FORMAT(FechaCompra,'%d/%m/%Y') as FechCompra FROM tbl_ventas
					INNER JOIN rel_ventasproductos ON pk_venta=pk_foliotiket
					INNER JOIN tbl_productos ON pk_producto=fk_producto
					INNER JOIN cat_clientes ON pk_cliente=fk_cliente
					WHERE pk_venta=".$pk_venta." 
					AND tbl_ventas.fk_estatus=1";
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}
	}
	public function ObtieneLosDatosDeLosClientesRegistrados(){
		$db= new conexion;
		$this->sql="SELECT *, IF(sexo = 1,'Hombre','Mujer') as sexoLetra,
					IF(fk_estatus = 1,'Activo','Inactivo') as estatusLetra
					FROM cat_clientes";
		$this->result=$db->executeQuery($this->sql);
		if(!$this->result){
			return false;
		}
		else{
			return $this->result;
		}
	}		
	
}
?>
	
