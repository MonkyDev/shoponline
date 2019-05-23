<?php
session_start();
if(isset($_POST)){
	$arreglo=$_SESSION['carrito'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['Id'] != $_POST['pk_producto']){
			$datosNuevos[]=array(
				'Id'=>$arreglo[$i]['Id'],
				'Nombre'=>$arreglo[$i]['Nombre'],
				'Precio'=>$arreglo[$i]['Precio'],
				'Imagen'=>$arreglo[$i]['Imagen'],
				'Cantidad'=>$arreglo[$i]['Cantidad']
				);
		}
	}
	if(isset($datosNuevos)){
		$_SESSION['carrito']=$datosNuevos;
		echo 1;
	}
	else{
		unset($_SESSION['carrito']);
		unset($_SESSION['totalCarrito']);
		echo 1;
	}
}
?>