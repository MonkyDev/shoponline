<?php
	session_start();
	include("../clases/consultas_db.php");
	$querys=new consultas;

	if(isset($_SESSION['carrito'])){
		if(isset($_POST['pk_producto'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_POST['pk_producto']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";
						$result=$querys->ConsultaDeVerProductoAndAgregar($_POST['pk_producto']);
							while ($row=$db->getRows($result)) {
								$nombre=$row['nom_prod'];
								$precio=$row['venta_prod'];
								$imagen=$row['repositorio'].$row['file_imagen'];
						}
						$datosNuevos=array('Id'=>$_POST['pk_producto'],
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;
					mysql_free_result($result);
					}
		}

	}else{#primera entrada cuando esta vacio el carrito
		if(isset($_POST['pk_producto'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$result=$querys->ConsultaDeVerProductoAndAgregar($_POST['pk_producto']);
				while ($row=$db->getRows($result)) {
					$nombre=$row['nom_prod'];
					$precio=$row['venta_prod'];
					$imagen=$row['repositorio'].$row['file_imagen'];
			}
			$arreglo[]=array('Id'=>$_POST['pk_producto'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		mysql_free_result($result);
		}
	}
?>
