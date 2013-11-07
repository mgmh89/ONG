 <?
                                include_once '../clases/db_connect.php';
                                if (isset($_POST['submitted'])) {
                                    foreach ($_POST AS $key => $value) {
                                        $_POST[$key] = mysql_real_escape_string($value);
                                    }
                                    $sql = "INSERT INTO `cita` ( `cod_cita` ,  `fecha_cita` ,  `hora_cita`) VALUES('{$_POST['cod_cita']}' ,  '{$_POST['fecha_cita']}' ,  '{$_POST['hora_cita']}' ) ";
                                    mysql_query($sql) or die(mysql_error());
                                    echo "Paciente guardado correctamente!.<br />";
                                }
                                ?>