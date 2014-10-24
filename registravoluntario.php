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
                
                
                <? 
include('ONG\clases\db_connect.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `voluntariado` ( `cod_vo` ,  `nombre_vo` ,  `apellido_vo` ,  `fecha_na_vo` ,  `genero_vo` ,  `telefono_vo` ,  `direccion_vo` ,  `departamento_vo` ,  `email_vo` ,  `password_vo` ,  `activo_v` ,  `id_rol_voluntario`  ) VALUES(  '{$_POST['cod_vo']}' ,  '{$_POST['nombre_vo']}' ,  '{$_POST['apellido_vo']}' ,  '{$_POST['fecha_na_vo']}' ,  '{$_POST['genero_vo']}' ,  '{$_POST['telefono_vo']}' ,  '{$_POST['direccion_vo']}' ,  '{$_POST['departamento_vo']}' ,  '{$_POST['email_vo']}' ,  '{$_POST['password_vo']}' ,  '{$_POST['activo_v']}' ,  '{$_POST['id_rol_voluntario']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Cod Vo:</b><br /><input type='text' name='cod_vo'/> 
<p><b>Nombre Vo:</b><br /><input type='text' name='nombre_vo'/> 
<p><b>Apellido Vo:</b><br /><input type='text' name='apellido_vo'/> 
<p><b>Fecha Na Vo:</b><br /><input type='text' name='fecha_na_vo'/> 
<p><b>Genero Vo:</b><br /><input type='text' name='genero_vo'/> 
<p><b>Telefono Vo:</b><br /><input type='text' name='telefono_vo'/> 
<p><b>Direccion Vo:</b><br /><input type='text' name='direccion_vo'/> 
<p><b>Departamento Vo:</b><br /><input type='text' name='departamento_vo'/> 
<p><b>Email Vo:</b><br /><input type='text' name='email_vo'/> 
<p><b>Password Vo:</b><br /><input type='text' name='password_vo'/> 
<p><b>Activo V:</b><br /><input type='text' name='activo_v'/> 
<p><b>Id Rol Voluntario:</b><br /><input type='text' name='id_rol_voluntario'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 

                
                
                
                
                
                
                
                
                
                
                   
                </div>       
            </div>
        </div>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

    </body>
</html>
