<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro de Voluntarios </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/normalize.css">
        <script src="assets/js/jquery-v1.10.2.js"></script>
        <script src="assets/js/bootstrap.js"></script>

    </head>
    <body>
        <!-- NAVBAR
                ================================================== -->
        <div id="header" class="navbar navbar-default navbar-static-top"></div>

        <div id="error"></div>
        <!-- // Script para cargar recursos html con jQuery en una pagina -->
        <script>$(document).ready(function() {
                $("#header").load("layout/public-header.html", function(status, xhr) {
                    if (status == "error") {
                        var msg = "Lo lamentamos, ha habido un errror cargando el Menu: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    }
                });
            });</script>
        <!--[if lt IE 7]>
                <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

        <!-- TODO EL CODIGO HTML QUE VAYAN A UTILIZA AQUI, NO BORREN NINGUNA LINEA DE CODIGO DE LAS QUE YA ESTAN AQUI -->
        <!-- NO NECESITAN PONER NINGUN SCRIPTS, EXCEPTO LAS PROPIAS CLASES CSS QUE CREEN. -->
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane active" id="regVoluntariado">
  <style>
            .loginError
            {
                text-align: center;
                font-weight: bold;
                font-size: 20px;
                color:red;
            }
        </style>
                            
                            <?php
        if ($_POST['action'] === 'Entrar') {
            echo '<p class="loginError">Usuario o Contraseña erroneo!</p>';
            $usuario_vo = $_POST['email_vo'];
            $pass_vo = $_POST['password_vo'];

            if (isset($usuario_vo) && !empty($pass_vo)) {
                include "clases/db_connect.php";
                $result = mysql_query("SELECT nombre_vo, cod_vo  FROM voluntariado where email_vo='$usuario_vo' and password_vo='$pass_vo'");
                while ($row = mysql_fetch_array($result)) {
                    $nombre = $row{'nombre_vo'};
		    $cod_vo = $row{'cod_vo'};
                    session_start();
                     $_SESSION['nombre'] = $nombre;
		    $_SESSION['cod_vo'] = $cod_vo;
                    echo $_SESSION['nombre'];
                    header("Location:/ONG/voluntarios/index.php"); /* Redirect browser */
                }
            } else {
                echo "Por favor introduzca un usuario y contrasenia correctos";
            }
        }
        ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Registro</div>
                        <div class="panel-body">
                                 
                           
                            <div class="col-md-6 col-md-offset-3">
                                <form action="#" method="POST" class="form-horizontal">
                                    <fieldset>
                                        <br>
                                        <div class="form-group">
                                            <label for="correo" class="col-lg-3 control-label">Correo</label>
                                            <div class="col-lg-8">
                                                <input type="email" name="email_vo" placeholder="Ejemplo: ejemplo@dominio.com" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Contrasenia" class="col-lg-3 control-label">Contraseña</label>
                                            <div class="col-lg-8">
                                                <input type="password" name="password_vo" class="form-control" placeholder="Contraseña" required>
                                            </div>
                                        </div>
                                        <div class="errorS">
                                            
                                        </div>
                                        <center><input type='submit' name='action' class="btn btn-info btn-large" value='Entrar' /></center>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                       
                    </div>

                </div>


                <script>
                    $('#myTab a').click(function(e) {
                        e.preventDefault();
                        $(this).tab('show');
                    });
                </script>


            </div>
        </div>
    </body>
</html>
