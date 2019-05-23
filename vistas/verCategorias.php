<?php
$url_db_comands="../clases/consultas_db.php";
	include($url_db_comands);
$db=new conexion;
$querys=new consultas;
?>
<?php
	$result=$querys->ConsultaDeProductosInicioPage();
	while($row=$db->getRows($result)) {
?>
		<div class="producto">
		<center>
			<img src="<?php echo $row['repositorio'].$row['caratula_categoria'];?>"><br>
			<span><?php echo $row['departamentos'];?></span><br>
			<a href="#" onClick="verProductoCategoria(<?php echo $row['pk_categoria']?>)">Ver más</a>
		</center>
	</div>
<?php
	}
	mysql_free_result($result);
?>