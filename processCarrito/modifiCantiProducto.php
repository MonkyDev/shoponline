<?php
session_start();
if(isset($_POST)){	
	switch($_POST['tipo']){
		case 1: //suma
				$arreglo=$_SESSION['carrito'];
				$encontro=0;
				for($i=0;$i<count($arreglo);$i++){
					if($arreglo[$i]['Id']==$_POST['pk_producto']){
						$encontro=$i;
					}
				}
				if($arreglo[$encontro]['Cantidad']!=10){
					$arreglo[$encontro]['Cantidad']+=1;	
					$_SESSION['carrito']=$arreglo;
				}
				
			echo 1;
		break;
		
		case 2: //resta
				$arreglo=$_SESSION['carrito'];
				$encontro=0;
				for($i=0;$i<count($arreglo);$i++){
					if($arreglo[$i]['Id']==$_POST['pk_producto']){
						$encontro=$i;
					}
				}
				if(!$arreglo[$encontro]['Cantidad']==0){
					$arreglo[$encontro]['Cantidad']-=1;	
					$_SESSION['carrito']=$arreglo;
				}
				
			echo 1;
		break;
	}
}
?>