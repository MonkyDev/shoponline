<?php
session_start();
session_name('inicio');
	include("../clases/consultas_db.php");
	$querys=new consultas;
if(isset($_POST)){
	$result=$querys->ObtieneLosDatosDelUsuarioForShopping($_POST['usr_nick']);
	$row=$db->getRows($result);
		if($row['nick']==$_POST['usr_nick'] && $row['pswd']==$_POST['psw_usr']){ 
			$_SESSION['usuario'] = $row['Nombre'];
			$_SESSION['pk_user'] = $row['pk_user'];
			if($row['fk_permisos']==2)
				echo '1|Bienvenido';
			else
				echo '2|Administrador';
		}
		else{
			echo '0|No registrado';
		} 
}
else{
	'0|No se ejecuto';
} 
?>