<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Registrarse_Doctor </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="validacionStyle.css">
        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.validate.js"></script>    
        <script src="assets/js/modernizr2.6.2.js"></script>       

    </head>
    <body>
         <div id="header1" class="navbar navbar-default navbar-static-top"></div>

        <div id="error"></div>
        <!-- // Script para cargar recursos html con jQuery en una pagina -->
        <script>$(document).ready(function() {
                $("#header1").load("layout/public-header.html", function(status, xhr) {
                    if (status == "error")
                    {
                        var msg = "Lo lamentamos, ha habido un errror cargando el Menu: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    }
                });
            });</script> 


        <div id="contenedor" class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Contactenos</div>
                <div class="panel-body">
                    <form action="#" name="contact" method="POST" class="form-horizontal" >
                        <div class="form-group">


                            <div class="form-group">
                                <label for="Nombre" class="col-lg-3 control-label" >Nombre</label>
                                <div class="col-lg-4">
                                    <input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre"  required pattern=.{4,25} >
                                </div>
                            </div>
				<div class="form-group">
                                <label for="Apellido" class="col-lg-3 control-label" >Apellido</label>
                                <div class="col-lg-4">
                                    <input type="text" name="apellido" class="form-control" placeholder="Escriba su apellido"  required pattern=.{4,25} >
                                </div>
                            </div>
				<div class="form-group">
                                <label for="JVPO" class="col-lg-3 control-label" >JVPO</label>
                                <div class="col-lg-4">
                                    <input type="text" name="JVPO" class="form-control" placeholder="Escriba su JVPO"  required pattern=.{4,25} >
                                </div>
                            </div>
				<div class="form-group">
                                    <label for="genero" class="col-lg-3 control-label" >Genero</label>
                                    <div class="col-lg-4">
                                        <select name="motivo" class="form-control" required="">
                                            <option value="NONE">- Seleccione -</option>
                                            <option value="opcion1">Femenino</option>
                                            <option value="opcion2">Masculino</option>
                                        </select>
                                    </div>
                                </div>
					<div class="form-group">
                                	<label for="fechanacimiento" class="col-lg-3 control-label" >Fecha de nacimiento</label>
                                	<div class="col-lg-4">
                                    	<input type="text" name="Fechanacimiento" class="form-control" placeholder="Escriba su fecha de nacimiento"  required pattern=.{4,25} >
                                   </div>
                            	</div>

HASTA AQUI ME QUEDE.




                            <div class="form-group">
                                <label for="Telefono_Contacto" class="col-lg-3 control-label"> Telefono de Contacto </label>
                                <div class="col-lg-4">
                                    <input type="tel" name="telefono" class="form-control" required pattern=".{7,15}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Email" class="col-lg-3 control-label">Correo</label>
                                <div class="col-lg-4">
                                    <input type="email" name="email" class="form-control" placeholder="Escriba un correo aqui"  required>
                                </div>
                            </div>
				<div class="form-group">
                                <label for="" class="col-lg-3 control-label">Correo</label>
                                <div class="col-lg-4">
                                    <input type="email" name="email" class="form-control" placeholder="Escriba un correo aqui"  required>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label for="motivo" class="col-lg-3 control-label" >Motivo</label>
                                    <div class="col-lg-4">
                                        <select name="motivo" class="form-control" required="">
                                            <option value="NONE">- Seleccione -</option>
                                            <option value="opcion1">Voluntario inscripcion</option>
                                            <option value="opcion2">Duda general</option>
                                            <option value="opcion3">Donaciones</option>
                                            <option value="opcion4">Citas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">    
                                <label for="Mensaje" class="col-lg-3 control-label" >Mensaje</label>
                                <div class="col-lg-6">
                                    <textarea name="mensaje" class="form-control col-lg-6" rows="10" > </textarea>

                                </div>
                            </div>
                            <center><button type="submit" name="enviar" value="enviar" class="btn btn-primary btn-lg" >Enviar</button></center>
                            
                        </div>
                    </form>
                </div>       
            </div>
        </div>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

    </body>
</html>
