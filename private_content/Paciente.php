<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Perfil Paciente</title>
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
        <script src="../assets/js/pacientedatos.js"></script>
        <script src="../assets/js/citas.js"></script>


        <style>
            .container
            {
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

        <div id="header" class="navbar navbar-default navbar-static-top">
            <?php
            include_once 'layout/private-header.php';
            if (isset($_GET['cod_pa'])) {
                include_once '../clases/db_connect.php';
                $cod_pa = $_GET['cod_pa'];
                $getPaciente = mysql_query("SELECT * FROM paciente where cod_pa=$cod_pa");
                while ($row = mysql_fetch_array($getPaciente)) {
                    $nombre = $row{'nombre_pa'};
                    $apellido = $row{'apellido_pa'};
                    $fechaNa = $row{'fecha_na_pa'};
                    $edad = $row{'edad_pa'};
                    $genero = $row{'genero_pa'};
                    $telefono = $row{'telefono_pa'};
                    $direccion = $row{'direccion_pa'};
                    $municipio = $row{'municipio_pa'};
                    $departamento = $row{'departamento_pa'};
                }
                $getExped = mysql_query("SELECT cod_pa FROM paciente where cod_pa in (SELECT cod_pa from paciente where cod_pa=$cod_pa)");
                while ($row = mysql_fetch_array($getExped)) {
                    $cod_expediente = $row{'cod_pa'};
                }
            }
            ?>
            
            
            
         
                <?php
            include_once 'layout/private-header.php';
            if (isset($_GET['cod_cita'])) {
                include_once '../clases/db_connect.php';
                $cod_cita= $_GET['cod_cita'];

                $getExp = mysql_query("SELECT cod_cita FROM cita where $cod_cita in (SELECT cod_cita from cita)");
                while ($row = mysql_fetch_array($getExped)) {
                    echo $cod_expediente = $row{'cod_cita'};
                }
            }
            ?>
            
            
            
        </div>
        <div id="contenedor" class="container">
            <div>
               <?php
        //include database configuration

        if (isset($_POST['guardar'])) {

            include_once '../clases/db_connect.php';
            //sql insert statement
            $sql = "insert into paciente(nombre_pa, apellido_pa, fecha_na_pa, edad_pa, genero_pa, telefono_pa, direccion_pa,municipio_pa, departamento_pa)
                values('{$_POST['nombre_pa']}', '{$_POST['apellido_pa']}', '{$_POST['fecha_na_pa']}', '{$_POST['edad_pa']}', '{$_POST['genero_pa']}', '{$_POST['telefono_pa']}', '{$_POST['direccion_pa']}', '{$_POST['municipio_pa']}','{$_POST['departamento_pa']}')";
            //insert query to the database
            if (mysql_query($sql)) {
                session_start();
                //if successful query
                echo "<script>alert('registro guardado correctamente!')</script>";
                $sql = "";

                $_SESSION['nombre'] = $_POST['nombre_pa'];
                header("Location: /ONG/private_content/Paciente.php"); /* Redirect browser */
                exit();
            } else {
                //if query failed
                die($sql . ">>" . mysql_error());
            }
        }
        ?>
                
                   <?php
                   
                if (isset($_POST['modificar'])) {
                    foreach ($_POST AS $key => $value) {
                        $_POST[$key] = mysql_real_escape_string($value);
                    }
                    
                    $sql = "UPDATE paciente SET  `nombre_pa` =  '{$_POST['nombre_pa']}' ,  `apellido_pa` =  '{$_POST['apellido_pa']}' ,  `fecha_na_pa` =  '{$_POST['fecha_na_pa']}' ,  `edad_pa` =  '{$_POST['edad_pa']}' ,  `genero_pa` =  '{$_POST['genero_pa']}' ,  `telefono_pa` =  '{$_POST['telefono_pa']}' ,  `direccion_pa` =  '{$_POST['direccion_pa']}' ,  `municipio_pa` =  '{$_POST['municipio_pa']}' ,  `departamento_pa` =  '{$_POST['departamento_pa']}'   WHERE `cod_pa` = $cod_pa";
                    mysql_query($sql) or die(mysql_error());
                    echo (mysql_affected_rows()) ? "Voluntario se actualizado correctamente!.<br />" : "Error al actualizar!. <br />";
                } else {
                    
                }
                ?>
                
            </div>
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#Datos">Datos</a></li>
                <li class=""><a href="#Expediente">Expediente</a></li>
                <li class=""><a href="#Citas">Citas</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="Datos">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Paciente</div>
                        <div class="panel-body">
                            <!--  <a href=agregarPaciente.php>Nuevo Paciente</a> -->
                           
                            <form action="#" id="paciente" method="POST" class="form-horizontal" id="pacientedatos">
                                <div class="form-group">
                                    <label for="Nombre" class="col-lg-3 control-label">Nombre</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="nombre_pa" value="<?php echo $nombre ?>"  class="form-control" placeholder="Escriba un nombre" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Apellido" class="col-lg-3 control-label">Apellido</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="apellido_pa" value="<?php echo $apellido ?>"  class="form-control" placeholder="Escriba un nombre" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_na_pa" class="col-lg-3 control-label">Fecha de nacimiento:</label>
                                    <div class="col-lg-3">
                                        <input type="date" name="fecha_na_pa" value="<?php echo $fechaNa ?>"   class="form-control"><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edad_pa" class="col-lg-3 control-label">Edad</label>
                                    <div class="col-lg-3">
                                        <input type="number" name="edad_pa" value="<?php echo $edad ?>"  min="3" max="80" onkeypress="return numeros(event)" class="form-control"><br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-lg-3 control-label">Genero</label>
                                    <div class="col-lg-4">
                                        <select name="genero_pa" class="form-control" required>
                                            <option value="<?php echo $genero ?>">- Seleccione -</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="telefono" class="col-lg-3 control-label">Telefono</label>
                                    <div class="col-lg-4">
                                        <input type="tel" value="<?php echo $telefono ?>" onkeypress="return numeros(event)" name="telefono_pa" placeholder="Escriba un numero de telefono" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <label for="direccionPaciente" class="col-lg-3 control-label">Direccion actual</label>
                                    <div class="col-lg-6">
                                        <input type="text" value="<?php echo $direccion ?>"  name="direccion_pa" class="form-control" placeholder="Escriba la direccion" required>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="municipio_pa" class="col-lg-3 control-label">Municipio</label>
                                        <div class="col-lg-4">
                                         <select name="municipio_pa" class="form-control" required>
                                         <option value="<?php echo $municipio ?>">- Seleccione -</option>
                                         <option value="Acajutla">Acajutla</option> 
                                         <option value="Agua Caliente">Agua Caliente</option>
                                         <option value="Aguilares ">Aguilares </option>
                                         <option value="Ahuachapán">Ahuachapán</option> 
                                         <option value="Alegría">Alegría</option>
                                         <option value="Anamorós ">Anamorós </option>
                                         <option value="Antiguo Cuscatlán ">Antiguo Cuscatlán </option>
                                         <option value="Apaneca">Apaneca</option> 
                                         <option value="Apastepeque">Apastepeque</option> 
                                         <option value="Apopa">Apopa</option> 
                                         <option value="Arambala">Arambala</option> 
                                         <option value="Arcatao">Arcatao</option> 
                                         <option value="Armenia">Armenia</option> 
                                         <option value="Atiquizaya">Atiquizaya</option> 
                                         <option value="Ayutuxtepeque">Ayutuxtepeque</option> 
                                         <option value="Azacualpa ">Azacualpa </option>
                                         <option value="Berlín">Berlín</option> 
                                         <option value="Bolivar ">Bolivar </option>
                                         <option value="Cacaopera">Cacaopera</option> 
                                         <option value="California ">California </option>
                                         <option value="Caluco">Caluco</option> 
                                         <option value="Candelaria">Candelaria</option>
                                         <option value="Candelaria de la Frontera ">Candelaria de la Frontera </option>
                                         <option value="Carolina">Carolina</option> 
                                         <option value="Chalatenango (ciudad)">Chalatenango (ciudad)</option> 
                                         <option value="Chalchuapa">Chalchuapa</option> 
                                         <option value="Chilanga">Chilanga</option> 
                                         <option value="Chiltiupán ">Chiltiupán </option>
                                         <option value="Chinameca">Chinameca</option> 
                                         <option value="Chapeltique">Chapeltique</option> 
                                         <option value="Chirilagua">Chirilagua</option> 
                                         <option value="Cinquera">Cinquera</option> 
                                         <option value="Citalá">Citalá</option> 
                                         <option value="Ciudad Arce">Ciudad Arce</option> 
                                         <option value="Ciudad Barrios">Ciudad Barrios</option> 
                                         <option value="Ciudad Delgado">Ciudad Delgado</option> 
                                         <option value="Coatepeque">Coatepeque</option> 
                                         <option value="Cojutepeque">Cojutepeque</option> 
                                         <option value="Colón">Colón</option> 
                                         <option value="Comacarán">Comacarán</option> 
                                         <option value="Comalapa">Comalapa</option> 
                                         <option value="Comasagua ">Comasagua </option>
                                         <option value="Concepción Batres ">Concepción Batres </option>
                                         <option value="Concepción de Ataco">Concepción de Ataco</option> 
                                         <option value="Concepción de Oriente ">Concepción de Oriente </option>
                                         <option value="Concepción Quezaltepeque">Concepción Quezaltepeque</option> 
                                         <option value="Conchagua ">Conchagua </option>
                                         <option value="Corinto">Corinto</option> 
                                         <option value="Cuisnahuat">Cuisnahuat</option> 
                                         <option value="Cuscatancingo">Cuscatancingo</option> 
                                         <option value="Cuyultitán">Cuyultitán</option> 
                                         <option value="Delicias de Concepción ">Delicias de Concepción </option>
                                         <option value="Dolores">Dolores</option> 
                                         <option value="Dulce Nombre de María">Dulce Nombre de María</option> 
                                         <option value="El Carmen (Cuscatlán)">El Carmen (Cuscatlán)</option> 
                                         <option value="El Carmen (La Unión)">El Carmen (La Unión)</option> 
                                         <option value="El Carrizal">El Carrizal</option> 
                                         <option value="El Congo">El Congo</option> 
                                         <option value="El Divisadero ">El Divisadero </option>
                                         <option value="El Paisnal ">El Paisnal</option>
                                         <option value="El Paraíso ">El Paraíso </option>
                                         <option value="El Porvenir">El Porvenir</option> 
                                         <option value="El Refugio ">El Refugio </option>
                                         <option value="El Rosario (Cuscatlán)">El Rosario (Cuscatlán)</option> 
                                         <option value="El Rosario (La Paz)">El Rosario (La Paz)</option> 
                                         <option value="El Rosario (Morazán) ">El Rosario (Morazán) </option>
                                         <option value="El Sauce">El Sauce</option> 
                                         <option value="El Tránsito">El Tránsito</option> 
                                         <option value="El Triunfo">El Triunfo</option> 
                                         <option value="Ereguayquín">Ereguayquín</option> 
                                         <option value="Estanzuelas">Estanzuelas</option> 
                                         <option value="Guacotecti ">Guacotecti </option>
                                         <option value="Guadalupe">Guadalupe</option> 
                                         <option value="Gualococti">Gualococti</option> 
                                         <option value="Guatajiagua ">Guatajiagua </option>
                                         <option value="Guaymango">Guaymango</option> 
                                         <option value="Guazapa">Guazapa</option> 
                                         <option value="Huizúcar">Huizúcar</option> 
                                         <option value="Ilobasco ">Ilobasco </option>
                                         <option value="Ilopango">Ilopango</option> 
                                         <option value="Intipucá">Intipucá</option> 
                                         <option value="Izalco ">Izalco </option>
                                         <option value="Jayaque">Jayaque</option> 
                                         <option value="Jerusalén ">Jerusalén </option>
                                         <option value="Jicalapa">Jicalapa</option> 
                                         <option value="Jiquilisco ">Jiquilisco </option>
                                         <option value="Joateca">Joateca</option> 
                                         <option value="Jocoaitique">Jocoaitique</option> 
                                         <option value="Jocoro">Jocoro</option> 
                                         <option value="Juayúa">Juayúa</option> 
                                         <option value="Jucuapa">Jucuapa</option> 
                                         <option value="Jucuarán">Jucuarán</option> 
                                         <option value="Jujutla">Jujutla</option> 
                                         <option value="Jutiapa">Jutiapa</option> 

                                            </select>

                                    </div>
                                   </div> 
                                
                                <div class="form-group">
                                    <label for="departamento" class="col-lg-3 control-label">Departamento</label>
                                    <div class="col-lg-4">
                                        <select name="departamento_pa" class="form-control" required="">
                                            <option value="<?php echo $departamento ?>">- Seleccione -</option>
                                            <option value="San Salvador">San Salvador</option>
                                            <option value="La Paz">La Paz</option>
                                            <option value="San Miguel">San Miguel</option>
                                            <option value="La Union">La Union</option>
                                            <option value="La Libertad">La Libertad</option>
                                            <option value="Santa Ana">Santa Ana</option>
                                            <option value="Sonsonate">Sonsonate</option>
                                            <option value="Ahuachapan">Aguachapan</option>
                                            <option value="San Vicente">San Vicente</option>
                                            <option value="Chalatenango">Chalatenango</option>
                                            <option value="Cabanias">Cabañas</option>
                                            <option value="Cuscatlan">Cuscatlan</option>
                                            <option value="Usulutan">Usulutan</option>
                                            <option value="Morazan">Morazan</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <center>
                                        <p><input type='submit' name="guardar" class="btn btn-primary btn-large" value='Guardar' />
                                            <input type="submit" name="modificar" value="Modificar" class="btn btn-primary btn-large">
                                            <input type='hidden' value='1' name='submitted' /> 
                                    </center>
                                </div>

                            </form>
                            <div class="table-responsive">
                                <?php
                                include_once '../clases/db_connect.php';
                                $tabla = "table ";
                                echo "<table class=" . $tabla . ">";
                                echo "<tr>";
                                echo "<td><b>Codigo</b></td>";
                                echo "<td><b>Nombre</b></td>";
                                echo "<td><b>Apellido</b></td>";
                                echo "<td><b>Fecha Na</b></td>";
                                echo "<td><b>Edad</b></td>";
                                echo "<td><b>Genero</b></td>";
                                echo "<td><b>Telefono</b></td>";
                                echo "<td><b>Direccion</b></td>";
                                echo "<td><b>Municipio</b></td>";
                                echo "<td><b>Departamento</b></td>";
                                echo "</tr>";
                                $result = mysql_query("SELECT * FROM `paciente`") or trigger_error(mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    foreach ($row AS $key => $value) {
                                        $row[$key] = stripslashes($value);
                                    }
                                    echo "<tr>";
                                    echo "<td valign='top'>" . nl2br($row['cod_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['nombre_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['apellido_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['fecha_na_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['edad_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['genero_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['telefono_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['direccion_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['municipio_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['departamento_pa']) . "</td>";
                                    echo "<td valign='top'><a href=paciente.php?cod_pa={$row['cod_pa']}>Editar</a></td><td><a href=eliminarPaciente.php?cod_pa={$row['cod_pa']}>Eliminar</a></td> ";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Expediente">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Ficha</div>
                        <div class="panel-body">
                            <h1 align="center">FICHA PARA DIAGNOSTICO ORAL</h1>

                            <form action="#" id="paciente" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label for="Nombre" class="col-lg-3 control-label">Nombre Paciente</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="nombre_pa" value="<?php echo $nombre ?>" class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Edad Paciente" class="col-lg-3 control-label">Edad</label>
                                    <div class="col-lg-3">
                                        <input type="number" name="edad_pa" value="<?php echo $edad ?>"  min="3" max="80" onkeypress="return numeros(event)" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Expediente N°" class="col-lg-3 control-label">Expediente N°</label>
                                    <div class="col-lg-3">
                                        <input  type="text" name="no_ex" value="<?php echo $cod_expediente ?>" class="form-control"required><br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Lugar de origen°" class="col-lg-3 control-label">Lugar de origen</label>
                                    <div class="col-lg-3">
                                        <input  type="text" name="direccion_pa" value="<?php echo $direccion ?>" class="form-control"required><br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Referido de" class="col-lg-3 control-label">Referido de</label>
                                    <div class="col-lg-3">
                                        <input  type="text" name="referido" class="form-control"required><br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Fecha" class="col-lg-3 control-label">Fecha</label>
                                    <div class="col-lg-3">
                                        <input  type="date" name="fecha_consulta" class="form-control"required><br>
                                    </div>
                                </div>
                                <div class="form-group">    
                                    <label for="Mensaje" class="col-lg-3 control-label">Motivo de consulta</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="textarea" name="consulta_pa" class="form-control col-lg-6" rows="2" required> <br>

                                    </div>
                                </div>
                                <div class="form-group">    
                                    <label for="Mensaje" class="col-lg-3 control-label">Tratamiento recibido</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="textarea" name="at_medicos" class="form-control col-lg-6" rows="2" required> <br>

                                    </div>
                                </div>

                                <div class="form-group">    
                                    <label for="Mensaje" class="col-lg-3 control-label">Antecedentes medicos</label>
                                    <div class="col-lg-8">
                                        <textarea name="antecedentes_pa" class="form-control col-lg-6" rows="2" required> </textarea>

                                    </div>
                                </div>
                                <br>
                                <center
                                    <p><input type='submit' class="btn btn-primary btn-large" value='Guardar Consulta' /><input type='hidden' value='3' name='submitted3' /> 
                                </center>
                                <br>
                            </form>

                            <div class="table-responsive">      
                                <?php
                                include_once '../clases/db_connect.php';

                                echo "<table class=" . $tabla . ">";
                                echo "<tr>";

                                echo "<td><b>No Expediente</b></td>";
                                echo "<td><b>Referido</b></td>";
                                echo "<td><b>At Medicos</b></td>";
                                echo "<td><b>Cod Pa</b></td>";
                                echo "<td><b>Consulta Pa</b></td>";
                                echo "<td><b>Antecedentes Pa</b></td>";
                                echo "</tr>";
                                $result = mysql_query("SELECT * FROM `expediente` where cod_pa=$cod_pa") or trigger_error(mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    foreach ($row AS $key => $value) {
                                        $row[$key] = stripslashes($value);
                                    }
                                    echo "<tr>";

                                    echo "<td valign='top'>" . nl2br($row['no_ex']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['referido']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['at_medicos']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['cod_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['consulta_pa']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['antecedentes_pa']) . "</td>";
                                    echo "<td valign='top'><a href=eliminarExpediente.php?cod_pa={$row['cod_pa']}>Delete</a></td> ";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                
             
                
                
                <div class="tab-pane" id="Citas">
                    <div class="panel panel-primary">
         <?php
        //include database configuration

        if (isset($_POST['g'])) {

            include_once '../clases/db_connect.php';
            //sql insert statement
            $sql = "insert into cita(numero_exp,doctor, fecha_cita, hora_cita)
                values('{$_POST['numero_exp']}', '{$_POST['nombre_doc']}', '{$_POST['fecha']}', '{$_POST['hora']}')";
            //insert query to the database
            if (mysql_query($sql)) {
                session_start();
                //if successful query
                echo "<script>alert('registro guardado correctamente!')</script>";
                $sql = "";

                $_SESSION['nombre'] = $_POST['numero_exp'];
                header("Location: /ONG/private_content/Paciente.php"); /* Redirect browser */
                exit();
            } else {
                //if query failed
                die($sql . ">>" . mysql_error());
            }
        }
        ?>
                        <div class="panel-heading">Seleccione fecha para proxima cita</div>
                        <div class="panel-body">
                            <form action="#" id="busquedaCita" class="form-horizontal" id="citas">
                                <div class="form-group">
                                    <label for="numero_expediente" class="col-lg-3 control-label">Numero de expediente:</label>
                                    <div class="col-lg-3">
                                        <input type="text" name="numero_exp" class="form-control "   placeholder="-----------" required>
                                    </div>

                                </div> 
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="Nombre_doc" class="col-lg-3 control-label">Doctor: </label>
                                        <div class="col-lg-6">
                                            <input type="text" name="nombre_doc" class="form-control" placeholder="Escriba nombre" required>
                                        </div>
                                    </div>
                                </div>
                                <label for="Fecha_Cita" class="col-lg-3 control-label">Proxima Cita:</label>
                                <div class="col-lg-3">
                                    <input type="date"  name="fecha" class="form-control"><br>
                                    <br>
                                    <label for="hora_Cita" class="col-lg-2 control-label">Hora:</label>
                                    <div class="col-lg-10">
                                        <input type="time"  class="form-control" name="hora">  
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <input type='submit' name="g" class="btn btn-primary btn-large" value='Guardar' />
                                            <input type="submit" name="m" value="Modificar" class="btn btn-primary btn-large">
                                            <br>
                                            <br>
                                    
                                </div>
                            </form>
                            <?php
                                include_once '../clases/db_connect.php';

                                echo "<table class=" . $tabla . ">";
                                echo "<tr>";

                                echo "<td><b>No Expediente</b></td>";
                                echo "<td><b>Doctor</b></td>";
                                echo "<td><b>Fecha</b></td>";
                                echo "<td><b>Hora</b></td>";
                                echo "</tr>";
                                $result = mysql_query("SELECT * FROM `cita` where cod_cita=$cod_cita") or trigger_error(mysql_error());
                                while ($row = mysql_fetch_array($result)) {
                                    foreach ($row AS $key => $value) {
                                        $row[$key] = stripslashes($value);
                                    }
                                    echo "<tr>";

                                    echo "<td valign='top'>" . nl2br($row['numero_exp']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['doctor']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['fecha_cita']) . "</td>";
                                    echo "<td valign='top'>" . nl2br($row['hora_cita']) . "</td>";
                                    echo "<td valign='top'><a href=eliminarCita.php?cod_cita={$row['cod_cita']}>Delete</a></td> ";
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









