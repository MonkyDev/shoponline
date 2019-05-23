<?php
	require_once("../clases/consultas_db.php");
	$querys=new consultas;
	$table="cat_clientes";
	$idRFC=$querys->ObtieneElNumeroDelSiguienteAregistrar($table);
?>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <h2><i class="fa fa-user-plus fa-4x" style="color:#428bca;"></i></h2>
                <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Registre sus datos </strong> 
                         <a href="#" style="float:right;" 
                         onclick="cargaPantallaSimple('clientes/login.php','viewContent');">atrás</a>
                            </div>
                            <div class="panel-body">
                                <form role="form" id="form_registroClientes">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" 
                                            placeholder="nombre " name="name" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>
                                     
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user-circle"  ></i></span>
                                            <input type="text" class="form-control" 
                                            placeholder="paterno" name="patern" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user-circle"  ></i></span>
                                            <input type="text" class="form-control"  
                                            placeholder="materno" name="matern" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>
                                        
                                        <div class="form-group ">
                                            <div class="input-group date form_date col-md-5" 
                                            data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <span class="input-group-addon"><i class='fa fa-birthday-cake'></i></span>
                                                <input class="form-control" type="text" style="width:250px;" id="birthday" 
                                                placeholder="aaaa-mm-dd" readonly/>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
            							</div>          

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-venus-mars"  ></i></span>
                                            <select class="form-control" name="sex" onkeypress="return jumpEnter(event,this)">
                                                <option value="0">selecione</option>
                                                <option value="1">másculino</option>
                                                <option value="2">femenino</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-address-book"  ></i></span>
                                            <input type="text" class="form-control"  
                                            placeholder="direccion de domicilio" name="address" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"  ></i></span>
                                            <input type="text" class="form-control"  
                                            placeholder="ciudad residencia" name="country" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"  ></i></span>
                                            <input type="text" class="form-control"  
                                            placeholder="còdigo postal casa" name="cod_pos" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone-square"  ></i></span>
                                            <input type="text" class="form-control"  
                                            placeholder="celular personal" name="phone" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card"  ></i></span>
                                            <input type="text" class="form-control"  
                                            placeholder="usuario" name="user_nick" onKeyPress="return jumpEnter(event,this)" 
                                            onFocus="generaRFCyUSER()"/>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  
                                            placeholder="contraseña" name="pass" onKeyPress="return jumpEnter(event,this)"/>
                                        </div>
                                        <!--inputs inputs hidden with information for sent to ajax-->
                                        <input type="hidden" id="dtp_input2" name="birthday"/>
                                        <input type="hidden" id="RFC" name="RFC_user"/>
                                        <input type="hidden" id="idCliente" value="<?php echo $idRFC;?>"/>
                                        <!--inputs inputs hidden-->
                                        <center>
                                              <a href="#" 
                                              onClick="altaDatosClienteCreaNickName('form_registroClientes','form-control');" 
                                              id="enviar" class="btn btn-primary">
                                                registrarse
                                              </a>
                                        </center>
                                    <hr/>
                                        <div class="alert alert-danger" style="display:none;" id="error">
                                          <center>Debe rellenar los campos requeridos.</center>
                                        </div>
                                     </form>
                            </div>
                           
                        </div>
                    </div>
        </div>
    </div>
</body>

<script type="text/javascript">
$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
});
</script>
