<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <h2><i class="fa fa-user fa-4x" aria-hidden="true" style="color:#428bca;"></i></h2>
                <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Ingese sus datos correctamente </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Escriba su nick " id="nick" onKeyPress="return jumpEnter(event,this)" autofocus />
                                        </div>
                                     
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Escriba su contrase&ntilde;a" id="pass"/>
                                        </div>
                                     <a href="#" onClick="checkUser();" class="btn btn-primary ">iniciar sesi&oacute;n ahora</a>
                                    <hr />
                                <center><a href="#" style="color:#F00;" 
                                onclick="cargaPantallaSimple('clientes/altaUsuario.php','viewContent');">REGISTRARSE</a></center>
                                     </form>
                            </div>
                           
                        </div>
                    </div>
        </div>
    </div>
</body>
