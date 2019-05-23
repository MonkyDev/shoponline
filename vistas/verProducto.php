<?php
	include("../clases/consultas_db.php");
	$db=new conexion;
	$querys=new consultas;
	
	if(isset($_GET)){
		$result=$querys->ConsultaDeVerProductoAndAgregar($_GET['pk_producto']);
		$row=$db->getRows($result);
?>	
	<div style="width:100%;height:5%;padding:2%;background-color:#0F73E1;">
        <i class="fa fa-close fa-lg" aria-hidden="true" onClick="closeWindow();" title="cerrar" style="float:right;" id="btn"></i>
        	<center><span><?php echo '<strong>'.$row['nom_prod'].'</strong>';?></span></center>
		</div>
	<section>
        <center>
            <div style="width:90%;height:10%;">
            	<img src="<?php echo $row['repositorio'].$row['file_imagen'];?>" width="300"><br>
            </div>
            <span><?php echo utf8_decode($row['descrip_prod']);?></span><br>
            <span>Precio: <?php echo "$".number_format($row['venta_prod'],2);?></span><br>
            <?php if($row['existencia'] > 0){?>
            <a href="#" onclick="enviarPkProductoToCarritoCompras(<?php  echo $row['pk_producto'];?>);">
            	Añadir al carrito de compras
           	</a>
            <?php } else echo '<span style="color:red;"><strong>producto agotado</strong></span>'?>
        </center>		
	</section>
<?php
}
?>