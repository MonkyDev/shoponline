<?php
session_start();
require_once("../../clases/conexion.php");
$db=new conexion;
date_default_timezone_set('America/Mexico_City'); 

if(isset($_SESSION)&&isset($_POST)){
	$datosCarrito=$_SESSION['carrito'];
	
	$ejecuto=1;
	if($db->startTransaction()){
		$noVenta=$db->genIndex('tbl_ventas',0);
		$total=$_SESSION['totalCarrito'];
		$sql="INSERT INTO tbl_ventas VALUES 
		(".$noVenta.",".$_POST['pk_cliente'].",'".date('Y-m-d')."','".date('H:i')."',".count($_SESSION['carrito']).",".$total.",1)";
		if(!$result=$db->execQueryTrans($sql))
			$ejecuto=0;
			
		for($i=0; $i<count($datosCarrito);$i++){
			$id=$datosCarrito[$i]['Id'];
			$cant=$datosCarrito[$i]['Cantidad'];;
			$pVenta=$datosCarrito[$i]['Precio'];;
			$importe=$datosCarrito[$i]['Cantidad'] * $datosCarrito[$i]['Precio'];
			$sql="INSERT INTO rel_ventasproductos 
			VALUES (".$noVenta.",".$id.",".$cant.",".$pVenta.",".$importe.")";
			if(!$result=$db->execQueryTrans($sql))
				$ejecuto=0;
					
			$sql="UPDATE tbl_productos SET existencia=existencia-".$cant." WHERE pk_producto=".$datosCarrito[$i]['Id'];
			if(!$result=$db->execQueryTrans($sql))
				$ejecuto=0;
		}
	}
	if($ejecuto){
		$db->commitTransaction();
		unset($_SESSION['carrito']);
		unset($_SESSION['totalCarrito']);
		echo "1|".$noVenta;
	}
	else{
		$db->breakTransaction();
		echo "0|ERROR: " . $db->_error;
	}
}
else{
	echo "0|No existe producto en la lista";
}
?>