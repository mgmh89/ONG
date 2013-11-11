<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Perfil voluntariado</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/normalize.css">
        <link rel="stylesheet" href="../assets/css/jqueryUI.css">
        <link rel="stylesheet" href="../validacionStyle.css">
        <script src="../assets/js/jquery-v1.10.2.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery-ui.js"></script>
        <script src="../assets/js/jquery.validate.js"></script>   
        <script src="../assets/js/modernizr2.6.2.js"></script>
        <script src="../assets/js/holder.js"></script>
        <script src="../assets/js/perfilVoluntariado.js"></script>

        <script>
            // fallback para el datepicker con jquery
            Modernizr.load({
                test: Modernizr.inputtypes.date,
                nope: ['http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js', 'jquery-ui.css'],
                complete: function() {
                    $('input[type=date]').datepicker({
                        dateFormat: 'yy-mm-dd'
                    });
                }

            });
        </script>

        <style>
            .container
            {
                width: 90%;
                margin-top: 1%;
                max-width: 1034px;
            }
            .panel panel-primary
            {
                margin-top: 1%;
                display: center;
                max-width: 1034px;
            }
            h2
            {
                text-align: center;
            }
            #publicarOferta
            {
                text-align: right;

            }
        </style>
        
        <script>
function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
		}
</script>

    </head>
    <body>
        <?php
        //include database configuration

        if (isset($_POST['Guardar'])) {

            include_once '../clases/db_connect.php';
            //sql insert statement
            $sql = "INSERT INTO `contactos` ( `nombre` ,  `apellido` ,  `telefono` ,  `email`) VALUES( '{$_POST['nombre']}' ,  '{$_POST['apellido']}' ,  '{$_POST['telefono']}' ,  '{$_POST['email']}') ";
            //insert query to the database
            if (mysql_query($sql)) {
                session_start();
                //if successful query
                echo "<script>alert('registro guardado correctamente!')</script>";
                $sql = "";

                $_SESSION['nombre'] = $_POST['nombre'];
                header("Location: /ONG/private_content/contacto_list.php"); /* Redirect browser */
                exit();
            } else {
                //if query failed
                die($sql . ">>" . mysql_error());
            }
        }
        ?>

        <div id="header" class="navbar navbar-default navbar-static-top">
            <?php
            include_once 'layout/private-header.php';
            ?>
        </div>
       
        <div id="error"></div>
        <!-- // Script para cargar recursos html con jQuery en una pagina -->
<!--        <script>$(document).ready(function() {
                $("#header").load("layout/private-header.html", function(status, xhr) {
                    if (status == "error")
                    {
                        var msg = "Lo lamentamos, ha habido un errror cargando el Menu: ";
                        $("#error").html(msg + xhr.status + " " + xhr.statusText);
                    }
                });
            });
        </script> -->
          <?php
            include_once 'layout/private-header.php';
            if (isset($_GET['idcontacto'])) {
                include_once '../clases/db_connect.php';
                $idcontacto = $_GET['idcontacto'];
                $getContacto = mysql_query("SELECT * FROM contactos where idcontacto=$idcontacto");
                while ($row = mysql_fetch_array($getPaciente)) {
                    $nombre = $row{'nombre'};
                    $apellido = $row{'apellido'};
                    $telefono = $row{'telefono'};
					$email = $row{'email'};
                }
            }
            ?>
        <div class="container">
        
        <?php
                if (isset($_POST['Modificar'])) {
                    foreach ($_POST AS $key => $value) {
                        $_POST[$key] = mysql_real_escape_string($value);
                    }
                    $sql = "UPDATE `contactos` SET  `nombre` =  '{$_POST['nombre']}' ,  `apellido` =  '{$_POST['apellido']}' ,  `telefono` =  '{$_POST['telefono']}' , `email` =  '{$_POST['email']}'   WHERE `idcontacto` = $idcontacto ";
                    mysql_query($sql) or die(mysql_error());
                    echo (mysql_affected_rows()) ? "actualizado correctamente!.<br />" : "Error al actualizar!. <br />";
                } else {
                    
                }
                ?>
            <div class="tab-content">
                <div class="tab-pane active" id="Perfil_volun">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Perfil voluntariado

                        </div>
                        <div class="panel-body">

                            <form action="#" method="POST" class="form-horizontal" id="perfilVoluntariado">
                                <div class="form-group">
                                    <label for="Nombre_doc" class="col-lg-3 control-label">Nombre</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control" placeholder="Escriba un nombre" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="apellido_doc" class="col-lg-3 control-label">Apellido</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="apellido" value="<?php echo $apellido ?>" class="form-control" placeholder="Escriba un apellido" required>
                                    </div>
                                </div>
                        
                                  <div class="form-group">
                                    <label for="telefono" class="col-lg-3 control-label">Telefono</label>
                                    <div class="col-lg-4">
                                        <input type="tel" name="telefono" onkeypress="return numeros(event)" value="<?php echo $telefono ?>" placeholder="Escriba un numero de telefono" class="form-control" required>
                                    </div>
                                </div>
           
                             <div class="form-group">
                                    <label for="correo" class="col-lg-3 control-label">Correo</label>
                                    <div class="col-lg-4">
                                        <input type="email" name="email" value="<?php echo $email ?>" placeholder="Ejemplo: ejemplo@dominio.com" class="form-control" id="focusedInput" required>
                                    </div>
                                </div>
                                
                                    <br>
                               
                                    <center>
                                   
                                      <input type='submit' name='Guardar' value='Guardar' class="btn btn-primary btn-large" />
                                   <input type='submit' name='Modificar' value='Modificar' class="btn btn-primary btn-large" />
                                    </center>
                                </div>
    
                        
          
                            </form>
                            
                             <?php
                                include_once '../clases/db_connect.php';
                               
                                $tabla = "table ";
                                echo "<table class=" . $tabla . ">";
                                echo "<tr>";
                                echo "<td><b>Id</b></td>";
                                echo "<td><b>Nombre</b></td>";
                                echo "<td><b>Apellido</b></td>";
                                echo "<td><b>Telefono</b></td>";
                                echo "<td><b>Email</b></td>";

                              ;
                                echo "</tr>";
                                $result = mysql_query("SELECT * FROM `contactos`") or trigger_error(mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    foreach ($row AS $key => $value) {
                                        $row[$key] = stripslashes($value);
                                    }
                                    
                                    echo "<tr>";
                                    echo "<td valign='top'>" . nl2br($row['idcontacto']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['nombre']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['apellido']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['telefono']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['email']) . "</td>";
                                    
                                   
                                    echo "<td valign='top'><a href=contacto_list.php?idcontacto={$row['idcontacto']}>Editar</a></td><td><a href=eliminarcoctacto.php?idcontacto={$row['idcontacto']}>Eliminar</a></td> ";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>

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
    <div class="footer">
        <style>
            .footer
            {

                padding: 10px;
                margin: 10px;
            }
        </style>
        <?php
        include_once 'layout/private-footer.php';
        ?>
    </div>
</html>