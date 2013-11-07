<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Contactenos </title>
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
   
    <script language="javascript">

<!--

    var nav4 = window.Event ? true : false;

    function acceptNum(evt)

    {

        // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57

        var key = nav4 ? evt.which : evt.keyCode;

        return (key <= 13 || (key >= 48 && key <= 57));

    }

//-->

</script>
       

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
            
             <?php 
        if(isset($_POST['boton'])){ 
            if($_POST['nombre'] == ''){ 
               
            }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/",$_POST['email'])){ 
                
            }else if($_POST['asunto'] == ''){ 
               
            }else if($_POST['mensaje'] == ''){ 
               
            }else{ 
                $dest = "krlacecy@hotmail.es"; //Email de destino 
                $nombre = $_POST['nombre']; 
                $email = $_POST['email']; 
                $asunto = $_POST['asunto']; //Asunto 
                $cuerpo = $_POST['mensaje']; //Cuerpo del mensaje 
                //Cabeceras del correo 
                $headers = "From: $nombre $emailrn"; //Quien envia? 
                $headers .= "X-Mailer: PHP5n"; 
                $headers .= 'MIME-Version: 1.0' . "n"; 
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "rn"; // 
  
                if(mail($dest,$asunto,$cuerpo,$headers)){ 
                    $result = '<div class="result_ok">Email enviado correctamente </div>'; 
                    // si el envio fue exitoso reseteamos lo que el usuario escribio: 
                    $_POST['nombre'] = ''; 
                    $_POST['email'] = ''; 
                    $_POST['asunto'] = ''; 
                    $_POST['mensaje'] = ''; 
					
					foreach($_POST AS $key => $value) {
                    $_POST[$key] = mysql_real_escape_string($value);
                } 

                $sql = "INSERT INTO `contactenos` (`nombre`,`email`,`asunto`,`mensaje`) VALUES ('{$_POST['nombre']}','{$_POST['email']}','{$_POST['asunto']}','{$_POST['mensaje']}')";
                mysql_query($sql) or die(mysql_error());
				
				 $result = '<div class="result_ok">Email enviado correctamente </div>';
                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre'] = '';
                $_POST['email'] = '';
                $_POST['asunto'] = '';
                $_POST['mensaje'] = '';
					
                }else{ 
                    $result = '<div class="result_fail">Hubo un error al enviar el mensaje </div>'; 
                } 
            } 
        } 
    ?> 


        <div id="contenedor" class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Contactenos</div>
                <div class="panel-body">
                    <form action="#" name="contact" method="POST" class="form-horizontal" >
                        <div class="form-group">


                            <div class="form-group">
                                <label for="Nombre" class="col-lg-3 control-label">Nombre</label>
                                <div class="col-lg-4">
                                    <input type="text" name="nombre"  class="form-control" placeholder="Escriba un nombre"  required pattern=.{4,25} value='<?php echo $_POST['nombre']; ?>'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Email" class="col-lg-3 control-label">Correo</label>
                                <div class="col-lg-4">
                                    <input type="email" name="email"  class="form-control" placeholder="Escriba un correo aqui"  required value='<?php echo $_POST['email']; ?>'>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label for="asunto" class="col-lg-3 control-label">Motivo</label>
                                    <div class="col-lg-4">
                                        <select name="asunto" class="form-control" required="">
           <option value="NONE" value='<?php echo $_POST['asunto']; ?>'>- Seleccione -</option>
                                            <option value="opcion1">Voluntario inscripcion</option>
                                            <option value="opcion2">Duda general</option>
                                            <option value="opcion3">Donaciones</option>
                                            <option value="opcion4">Citas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">    
                                <label for="Mensaje" class="col-lg-3 control-label">Mensaje</label>
                                <div class="col-lg-6">
<textarea name="textarea" class="form-control col-lg-6" rows="10" value='<?php echo $_POST['mensaje']; ?>'</textarea>
                                    </textarea>

                                </div>
                            </div>
                            <center>
                            <button type="submit" name="asdfEnviar" value="Enviar" class="btn btn-primary btn-lg" >Enviar</button>
                            <?php echo $result; ?> 
                            </center>
                            
                        </div>
                    </form>
                </div>       
            </div>
        </div>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

    </body>
</html>
