<?php
	include("../clases/consultas_db.php");
	$db=new conexion;
	$querys=new consultas;
	
	if(isset($_POST)){
		extract($_POST);
		
	$result=$querys->ConsultaDeProductosPorCategorias($pk_categoria);
	while($row=$db->getRows($result)){
?>
		<div class="producto">
            <span style="float:right;" class="msgbox">
            <?php 	
				if($row['existencia']>=5){
					$color='success';
					$text='en existencia';
				}
				elseif($row['existencia']>=1){
					$color='warning';
					$text='agotandose';
				}
				elseif($row['existencia']==0){
					$text='agotado';
					$color='danger';
				}
			?>
                <span class="btn btn-<?php echo $color;?>" style="border-radius:60%;" title="existencia" id="canti_existe" 
                onmouseover="view()">
                   <?php echo $row['existencia']?>
                </span>
                <span class="btn btn-<?php echo $color;?>" style="display:none;" title="existencia" id="str_existe">
                    <?php echo $text;?>
                </span>
            </span>
			<center>
				<img src="<?php echo $row['repositorio'].$row['file_imagen'];?>" 
                onClick="verDetalles(<?php echo $row['pk_producto']?>)"><br>
				<span><?php echo $row['nom_prod'];?></span><br>
			</center>
            
		</div><font color="#FF0000">
<?php
	}
mysql_free_result($result);
}
?>
<script type="text/javascript">
function view(){
	$('.msgbox #str_existe').css('display','block');
	$('.msgbox #canti_existe').css('display','none');
	setTimeout(function(){
		$('.msgbox #str_existe').css('display','none');
		$('.msgbox #canti_existe').css('display','block');
	},500);
    
}
</script>
		