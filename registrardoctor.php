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
                    <form action="#" name="contact" method="POST" class="form-horizontal" id="doctor" >
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
                                        <select name="genero" class="form-control" required="">
                                            <option value="NONE">- Seleccione -</option>
                                            <option value="opcion1">Femenino</option>
                                            <option value="opcion2">Masculino</option>
                                        </select>
                                    </div>
                                </div>
					<div class="form-group">
                                	<label for="fechanacimiento" class="col-lg-3 control-label" >Fecha de nacimiento</label>
                                	<div class="col-lg-4">
                                    	<input type="text" name="Fechanacimiento" class="form-control" placeholder="1989/05/26"  required pattern=.{4,25} >
                                   </div>
                            	</div>
                            <div class="form-group">
                                <label for="direccion" class="col-lg-3 control-label"> Dirección </label>
                                <div class="col-lg-4">
                                    <input type="text" name="direccion" class="form-control" required pattern=".{7,15}">
                                </div>
                            </div>
                            <label for="deparatamento" class="col-lg-3 control-label" >Departamento</label>
                                    <div class="col-lg-4">
                                        <select name="departamento" class="form-control" required="">
                                            <option value="NONE">- Seleccione -</option>
                                            <option value="opcion1">San salvaodor</option>
                                            <option value="opcion2">La Libertad</option>
                                            <option value="opcion3">Cabañas</option>
                                            <option value="opcion4">La unión</option>
                                            <option value="opcion5">Chalatenango</option>
                                            <option value="opcion6">San Miguel</option>
                                            <option value="opcion7">Sonsonate</option>
                                            <option value="opcion8">Ahuachapan</option>
                                            <option value="opcion9">Morazan</option>
                                            <option value="opcion10">Usulutan</option>
                                            <option value="opcion11">La Paz</option>
                                            <option value="opcion12">Sata Ana</option>
                                            <option value="opcion13">Cuscatlan</option>
                                            <option value="opcion14">San Vicente</option>
                                        </select>
                                    </div>
                                </div>

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
                                <label for="Email" class="col-lg-3 control-label">Contraseña</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password" id="pass1" class="form-control" placeholder="Tu contraseña"  required>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="Email" class="col-lg-3 control-label">Confirmar contraseña</label>
                                <div class="col-lg-4">
                                    <input type="password" name="password" id="pass2" class="form-control" placeholder="Confirma tu contraseña"  required>
                                </div>
                            </div>
                
                            <center><button type="submit" name="enviar" id="enviar" value="enviar" class="btn btn-primary btn-lg" >Enviar</button></center>
                            
                        </div>
                    </form>
                </div>       
            </div>
        </div>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

    </body>
</html>

 <script>
$(document).on('ready',function(){

    $('button#enviar').on('click', verificar);
 $('form#doctor').on('submit', function(event){event.preventDefault()});
});

function verificar()
{
    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();
    if(pass1 !== pass2){
        alert('Su contraseña no coinciden');
    }else{
        $.ajax({
            url: 'voluntarios/enviarDoctor.php',
            type: 'post',
            dataType: 'text',
            data: $('form#doctor').serialize(),
        })
        .done(function(data) {
            alert('Su informacion ha sido enviada');
            $('input').val('');
            console.log(data);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    }
}


 </script>