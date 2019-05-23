$(document).ready(function(e) {
    $('#btnmain').click(function(e){
    	$('.viewContent').css('width','85%');
    	$('.main').css('display','block');
    	$('#btnmain').css('display','none');
    	$('#btnmain1').css('display','block');
    	$(this).each(function(){ //aplicamos el efecto de transicion en la ventana				
			$('.main').addClass("slideDown");
		});
		setTimeout(function(){
			$('.viewContent').css('width','100%');
			$('.main').css('display','none');
			$('#btnmain').css('display','block');
			$('#btnmain1').css('display','none');
		},10000);
    });

    $('#btnmain1').click(function(e){
    	$('.viewContent').css('width','100%');
    	$('.main').css('display','none');
    	$('#btnmain').css('display','block');
    	$('#btnmain1').css('display','none');
    	$(this).each(function(){ //aplicamos el efecto de transicion en la ventana				
			$('.main').addClass("slideDown");
		});
		setTimeout(function(){
			$('.viewContent').css('width','85%');
			$('.main').css('display','block');
			$('#btnmain').css('display','none');
			$('#btnmain1').css('display','block');
		},10000);
    });

	$('#optionMain').click(function(e){
    	$('.viewContent').css('width','100%');
    	$('.main').css('display','none');
    	$('#btnmain').css('display','block');
    	$('#btnmain1').css('display','none');
    	$(this).each(function(){ //aplicamos el efecto de transicion en la ventana				
			$('.main').addClass("slideDown");
		});
    });

    $.ajax({
		url:'vistas/verCategorias.php',
		success: function(result){
			$('#viewContent').html(result);
		}    
    });
	
});
function displayWindow(w,h){
	$('html, body').animate({scrollTop:0}, 'slow');
	var x=w/2;
	var y=h/2;
	$('#backScreen,#window').fadeIn(1800);
	document.getElementById('backScreen').style.display="block";
	document.getElementById('window').style.display="block";
	document.getElementById('window').style.width=w+"px";
	document.getElementById('window').style.height=h+"px";
	document.getElementById('window').style.marginTop="-"+y+"px";
	document.getElementById('window').style.marginLeft="-"+x+"px";
	$(this).each(function(){ //aplicamos el efecto de transicion en la ventana
		$('#window').removeClass();				
		$('#window').addClass("slideDown");
	});	
}

function closeWindow(){	
	$('#backScreen,#window').fadeOut(1000);		
}

function cargaPantallaSimple(file,content){
	$.ajax({
		url:file,
		success: function(e){
			$('html, body').animate({scrollTop:0}, 'slow');
			$('#'+content).html(e);
		}	
	});
}

function cerrarPantalla(){
	$('html, body').animate({scrollTop:0}, 'slow');
	document.getElementById('content').innerHTML="";
}

function verDetalles(pk_producto){
	displayWindow('500','600');
	cargaPantallaSimple('vistas/verProducto.php?pk_producto='+pk_producto,'window')
}

function jumpEnter(e,obj) { // salta en mozilla
  tecla=(document.all) ? e.keyCode : e.which;
  if(tecla!=13) return;
  frm=obj.form;
  for(i=0;i<frm.elements.length;i++) 
    if(frm.elements[i]==obj) { 
      if (i==frm.elements.length-1) i=-1;
      break }
  frm.elements[i+1].focus();
  return false;
}

function generaRFCyUSER(){
	var paterno=$('input[name=patern]').val().substring(0,2);
	var materno=$('input[name=matern]').val().substring(0,2);
	var birthday=$('input[name=birthday]').val().split("-");
	var idcliente=$('#idCliente').val();
	
	
	var date=(birthday[0]).substring(2)+birthday[1]+birthday[2];
	var RFC=(paterno+materno+date).toUpperCase();
	var nickUser=(paterno+materno+date+idcliente).toUpperCase();;
	
	if(paterno!="" && materno!="" && birthday!=""){
		$('input[name=patern]').css('border-color','');
		$('input[name=matern]').css('border-color','');
		$('#birthday').css('border-color','');
		
		$('input[name=user_nick]').val(nickUser).attr('readonly',true);
		$('#RFC').val(RFC);//input oculto para guardar en la base de datos
	}
	else{
		$('input[name=patern]').css('border-color','#F00');
		$('input[name=matern]').css('border-color','#F00');
		$('#birthday').css('border-color','#F00');
	}
} 

function blockButton(btn){
	$('#'+btn).each(function (){
    	this.style.pointerEvents = 'none'; 
	});
}

function activeButton(btn){
	$('#'+btn).each(function (){
    	this.style.pointerEvents = 'auto'; 
	});
}

 function checkUser(){
	var usr=$('#nick').val();
	var psw=$('#pass').val();
	if(psw!="" &&  psw!=""){
		$.ajax({
			url:'clientes/checkUser.php',
			type:'POST',
			data:'usr_nick='+usr+'&psw_usr='+psw,
			success: function(e){
				var res=e.split('|');
				if(res[0]==1){
					alert(res[1]+' '+'Procede a relizar tu compra y recuerda cerrar sesion al finalizar tus compras');
					cargaPantallaSimple('vistas/carritodecompras.php','viewContent');
				}
				else if(res[0]==2){
					alert("Bienvenido "+res[1]);
					window.open('verVentasEnMiTienda.php');
					$('#nick').val("");
					$('#pass').val("");
				}
				else{
					alert("El servidor responde..."+res[1]);
					$('#nick').val("");
					$('#pass').val("");
				}
			}
		})
	}else{
		alert('campos vacios...')
	}
}

function salir(){
	if(confirm('Finalizar Session... Desea cerrar sesion?')){
		window.location='logOut.php';
		alert('Esperamos tu visita de nuevo');
	}
}
	
function senMailCliente(){
	$.ajax({
		url:'administrador/enviarEmailCliente.php',
		type:'POST',
		success: function(e){
			alert(e);
		}
	});
}








