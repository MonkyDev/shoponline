<?php
require_once("../../clases/modificacion_db.php");
require_once("../../clases/conexion.php");

$modif=new modificacion;
$db=new conexion;
date_default_timezone_set('America/Mexico_City');

if(isset($_POST)){
	extract($_POST);
	switch($acc){
		case 1:
			$tbl_cliente='cat_clientes';	$tbl_users='tbl_users';	$status=1;	$permiso=2;	$request=NULL;
			$pk_cliente=$db->genIndex($tbl_cliente,0);
				$NOMBRE=trim($NAME." ".$PATERN." ".$MATERN);
				
				$stringClient=
				'RFC='.$RFC_USER. 
				'|Nombre='.$NOMBRE. 
				'|Direccion='.trim($ADDRESS). 
				'|Ciudad='.trim($COUNTRY). 
				'|CoodPost='.$COD_POS.
				'|Telefono='.$PHONE.
				'|sexo='.$SEX.
				'|birthday='.$BIRTHDAY.
				'|fk_estatus='.$status;
				
				$stringUser=
				'nick='.$USER_NICK.
				'|pswd='.strtolower($PASS).
				'|fk_clientes='.$pk_cliente.
				'|fk_permisos='.$permiso.
				'|fech_register='.date('Y-m-d');
			
			$request=$modif->InsertarDatosNuevoCliente($tbl_cliente,$stringClient);
			if($request==1){
				$modif->InsertarDatosNuevoCliente($tbl_users,$stringUser);
				echo "1|Ejecuto registro de datos";
			}
				
		break;
		
	}
}
else{
	echo '0|No se recibio información';
}
?>