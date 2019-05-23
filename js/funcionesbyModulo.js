function verProductoCategoria(pk_categoria){
	$.ajax({
		url:'vistas/verProductosbyCategoria.php',
		type:'POST',
		data:'pk_categoria='+pk_categoria,
		success: function(result){
			$('#viewContent').html(result);
		}
	});
}

function enviarPkProductoToCarritoCompras(pk_producto){
	$.ajax({
		url:'vistas/carritodecompras.php',
		type:'POST',
		data:'pk_producto='+pk_producto,
		success: function(result){
			$('#viewContent').html(result);
			cargaPantallaSimple('vistas/carritodecompras.php','viewContent');
			closeWindow();
		}
	});
}

function modificarCantidadProducto(tipo,pk_producto){
	$.ajax({
		url:'processCarrito/modifiCantiProducto.php',
		type:'POST',
		data:'pk_producto='+pk_producto+'&tipo='+tipo,
		success: function(result){
			if(result==1){
				cargaPantallaSimple('vistas/carritodecompras.php','viewContent');
			}
		}
	});
}

function deleteProducto(pk_producto){
	$.ajax({
		url:'processCarrito/deleteArticulo.php',
		type:'POST',
		data:'pk_producto='+pk_producto,
		success: function(result){
			if(result==1){
				cargaPantallaSimple('vistas/carritodecompras.php','viewContent');
			}
		}
	});
}

function altaDatosClienteCreaNickName(form,clase){
	$(document).on('click','#'+form,function(event){
		var error = 0;
		$('.'+clase).each(function(i, elem){
			if($(elem).val() == ''){
				//$(elem).css({'border':'1px solid red'});
				error++;
			}
		});
		if(error > 0){
			event.preventDefault();
			$('#error').css('display','block');
		}
		else{
			blockButton('enviar');
			$('#error').css('display','none');
			var datas=$('#' + form).serialize();
			datas=datas.toUpperCase();
			var strdatas='acc=1&'+datas;
				$.ajax({
					url: 'coderuntodb/altas/insertNewsClientes.php',
					type: 'POST',
					data: strdatas,
					success: function(res){
						var request=res.split('|');
						if(request[0]==1){
							cargaPantallaSimple('clientes/login.php','viewContent');
						}
						else{
							alert(request[1]);
							activeButton('enviar');
						}
					}
				});
		}//fin else
	});			
}

function cobrarItemsShop(pk_cliente){
	var folioOrden=prompt("INGRESE EL FOLIO PROPORCIONADO POR PAYPAL, DE LA ORDEN DE COMPRA");
	if(folioOrden!="" && folioOrden!=null){
		$.ajax({
			url:"coderuntodb/ventas/insertNewsVentas.php",
			type:'POST',
			data:'pk_cliente='+pk_cliente,
			success: function(e){
				res=e.split('|');
				if(res[0]==1){
					var noTicket=res[1];
				alert("Muchas gracias por su compra el pedido sera enviado a la direecion descrita muestre el tiket de compra para la entrega");
					var url="reportes/viewTicketCompra.php?noTick="+noTicket+"&folioOrden="+folioOrden;
					window.open(url,"Ticket_de_Compra","width=600, height=600, scrollbars=yes");
				}
			window.location="index.php";
			}
		});
	}else{
		alert("ingrese el folio proporcionado por paypal para poder recibir la compra");
	}
}



































