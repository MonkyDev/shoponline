<?php
session_start();
session_name('inicio');
$head="upHeadPage.php";
$footer="downHeadPage.php";
	include($head);
?>
<section id="headPage" class="headPage">
<!--    <span class="btn-group" id="btnmain">
        <a class="btn btn-default" href="#" style="border-radius:60%;">
            <i class="fa fa-align-justify fa-lg" title="menú"></i>
        </a>
    </span>
    <span class="btn-group" id="btnmain1" style="display:none;">
        <a class="btn btn-default" href="#" style="border-radius:60%;">
            <i class="fa fa-align-justify fa-lg" title="menú"></i>
        </a>
    </span>
-->    <div style="font-size:28px;"><center>
    	<?php if(isset($_SESSION['usuario'])){
			echo '<i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;'.
				$_SESSION['usuario'];
		} 
		?>
   </center></div>
</section>

<section id="bodyPage" class="bodyPage">
	<div class="toolbarbtns">
    	<table align="center" style="float:left;">
        	<tr>
            	<td>
                    <span class="fa-stack fa-lg" id="btn" title="inicio" onclick="javascript: location.reload(true);">
                      <i class="fa fa-square-o fa-stack-2x" style="color:#3c763d;"></i>
                      <i class="fa fa-home fa-stack-1x" style="color:#428bca;"></i>
                    </span>
                </td>
                <td>
                	<span class="fa-stack fa-lg" id="btn" title="clientes"
                    onclick="cargaPantallaSimple('administrador/viewTableClientes.php','viewContenido');">
                      <i class="fa fa-square-o fa-stack-2x" style="color:#3c763d;"></i>
                      <i class="fa fa-address-book fa-stack-1x" style="color:#428bca;"></i>
                    </span>
                </td>
                <td>
                	<span class="fa-stack fa-lg" id="btn" title="ventas" 
                    onclick="cargaPantallaSimple('administrador/viewTableVentas.php','viewContenido');">
                      <i class="fa fa-square-o fa-stack-2x" style="color:#3c763d;"></i>
                      <i class="fa fa-dollar fa-stack-1x" style="color:#428bca;"></i>
                    </span>
                </td>
                <td>
                	<span class="fa-stack fa-lg" id="btn" title="productos" 
                    onclick="cargaPantallaSimple('administrador/viewTableProductos.php','viewContenido');">
                      <i class="fa fa-square-o fa-stack-2x" style="color:#3c763d;"></i>
                      <i class="fa fa-book fa-stack-1x" style="color:#428bca;"></i>
                    </span>
                </td>
            </tr>
        </table>
        <table align="center" style="float:right;">
        	<tr>
            	<td>
                    <span class="fa-stack fa-lg" id="btn" title="cerrar sesion" 
                    onclick="salir();">
                      <i class="fa fa-square-o fa-stack-2x" style="color:#3c763d;"></i>
                      <i class="fa fa-sign-out fa-stack-1x" style="color:#F00;"></i>
                    </span>
                </td>
            </tr>
        </table>
    </div>

	<div id="backScreen"></div>
  	<div id="window"></div>

	<div id="viewContenido" class="viewContent">
		
	</div>
<!--	<div id="main" class="main">	
		<div class="list-group" id="optionMain">
		  <a class="list-group-item" href="#" onclick="cargaPantallaSimple('vistas/verCategorias.php','viewContent');">
          	<span class="btn btn-primary" style="border-radius:60%;">
            <i class="fa fa-home fa-fw" aria-hidden="true"></i></span>&nbsp;Inicio</a>
            
		  <a class="list-group-item" href="#" onclick="cargaPantallaSimple('clientes/altaUsuario.php','viewContent');">
          <span class="btn btn-primary" style="border-radius:60%;">
          <i class="fa fa-list fa-fw" aria-hidden="true"></i></span>&nbsp; Registrarse</a>
          
		  <a class="list-group-item" href="#" onclick="cargaPantallaSimple('clientes/login.php','viewContent');">
          <span class="btn btn-primary" style="border-radius:60%;">
          <i class="fa fa-user fa-fw" aria-hidden="true"></i></span>&nbsp; Login</a>
          
		  <a class="list-group-item" href="#" onclick="cargaPantallaSimple('vistas/carritodecompras.php','viewContent');">
          <span class="btn btn-primary" style="border-radius:60%;">
          <i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i></span>&nbsp; Mi cesta</a>
          
          <a class="list-group-item" href="#" onclick="salir();">
          <span class="btn btn-primary" style="border-radius:60%;">
          <i class="fa fa-unlink fa-fw" aria-hidden="true"></i></span>&nbsp; Cerrar session</a>
		</div>
	</div>
-->
</section>
</html>
<?php 
	include($footer);
?>