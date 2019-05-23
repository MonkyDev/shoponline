<?php 
include("../processCarrito/processCarrito.php");
session_name('inicio');
?>
 	<div class="toolbarbtns">
        <table align="center" style="float:left; position:absolute;">
            <tr>
                <td>
                    <span>
                        <?php if(isset($_SESSION['usuario'])){
                            echo '<i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;'.
                                $_SESSION['usuario'];
                        } 
                        ?>
                    </span>
                </td>
            </tr>
        </table>
    </div>
<?php
if(isset($_SESSION['carrito'])){
	$_SESSION['totalCarrito']=NULL;
	$datos=$_SESSION['carrito'];
	$total=0;
		for($i=0;$i<count($datos);$i++){
			$subtotal=$datos[$i]['Cantidad']*$datos[$i]['Precio'];
			$total+=$subtotal;
?>
                <div class="producto">
                <i class="fa fa-trash fa-lg" aria-hidden="true" title="eliminar" style="float:left;color:#F00;" id="btn"
                onClick="deleteProducto(<?php echo $datos[$i]['Id'];?>);"></i>
                    <center>
                        <img src="<?php echo $datos[$i]['Imagen'];?>"><br>
                        <span ><?php echo $datos[$i]['Nombre'];?></span><br>
                        <span>Precio: <?php echo "$".number_format($datos[$i]['Precio'],2);?></span><br>
                        <span>Cantidad:</span><br>
                        <div style="width:100px;height:30px;"> 
                        <table>
                        	<tr>
                            	<td><input type="button" class="form-control" style="width:25px;padding:0px;" value="+" 
                                onclick="modificarCantidadProducto(1,<?php echo $datos[$i]['Id'];?>);"/></td>
                                <td>
                                	<input type="text"
                                    id="cantidad"	
                                    value="<?php echo $datos[$i]['Cantidad'];?>"
                                    class="form-control" 
                                    style="width:50px;text-align:center;"
                                    min="0" max="10" readonly/>
                                </td>
                                <td><input type="button" id="min" class="form-control" style="width:25px;padding:0px;" value="-"
                                onclick="modificarCantidadProducto(2,<?php echo $datos[$i]['Id'];?>);"/></td>
                            </tr>
                        </table>
                        </div><br>
                        <span class="subtotal">Subtotal:<?php echo "$".number_format($subtotal,2);?></span><br>
                    </center>
                </div>
<?php
			$_SESSION['totalCarrito']=$total;
		}
	echo '<center><h2>Total:&nbsp;'."$".number_format($_SESSION['totalCarrito'],2).'</h2></center>';		
}
else{
	echo '<center><h2>No has añadido ningun producto</h2></center>';
}

if(isset($_SESSION['totalCarrito'])!=NULL){
?>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="wyrecosmonky@gmail.com">
            <input type="hidden" name="currency_code" value="MXN">
            
            <?php 
                for($i=0;$i<count($datos);$i++){
            ?>
                <input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nombre'];?>">
                <input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
                <input	type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">	
            <?php 
                }
				if(isset($_SESSION['usuario'])!=NULL){
            ?>
                
            <center>
                <table>
                	<tr>
                    	<td><i class="fa fa-paypal fa-2x" aria-hidden="true"></i></td>
                    	<td>
                        	<input type="submit" value="pagar" class="form-control" style="width:200px" id="btn"/>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                        	 <input type="button" value="imprimir ticket" class="form-control" style="width:200px" id="btn" 
                             onclick="cobrarItemsShop(<?php echo $_SESSION['pk_user'];?>)" />
                        </td>
                         <td><i class="fa fa-print fa-2x" aria-hidden="true"></i></td>
                    </tr>
                </table>
            </center>
    	</form>
<?php
				}
				else{
?>
					<center>
                    	<a href="#" onclick="cargaPantallaSimple('clientes/login.php','viewContent');">Inicia sesión para realizar la compra</a>
                    </center>
<?php
				}
}
else{
	echo '<center><i class="fa fa-cart-plus fa-3x" aria-hidden="true" title="agregar" id="btn"></i></center>';
}
?>
<center><a href="./">Ver catalogo</a></center>
<script>
$("#formulario").submit(function(event){
	event.preventDefault();
	alert("una vez pagado en paypal regresa a la pagina eh ingresa la orden de compra para imprimir tu ticket");		
}(this).trigger('click'));
</script>












