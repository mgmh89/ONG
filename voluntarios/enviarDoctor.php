
<?php 

$servidor = "localhost";
$usuario = "root";
$password = "gaby";
$databaseName = "cocides";

//echo "<p>hola mundo desde la clase de conexion..</p>";
if (!($conexion = mysql_connect($servidor, $usuario, $password) or die('Error al conectar con mysql'))) {
    echo "algo fallo en la conexion";
    //exit();
}
else{
//    echo "hay conexion";
    mysql_select_db($databaseName) or die('Imposible acceder a base de datos!');
}


$nombre		= $_REQUEST["nombre"];
$apellido	= $_REQUEST["apellido"];
$jvpo		= $_REQUEST["JVPO"];
$genero		= $_REQUEST["genero"];
$fechana	= $_REQUEST["Fechanacimiento"];
$direccion	= $_REQUEST["direccion"];
$departamento = $_REQUEST["departamento"];
$telefono		= $_REQUEST["telefono"];
$email		= $_REQUEST["email"];
$password	= $_REQUEST["password"];
$nombre		= $_REQUEST["nombre"];


$query = "INSERT INTO `cocides`.`doctor` (`nombre_doc`, `apellido_doc`, `JVPO`, `genero_doc`, `fecha_na_doc`, `password_doc`, `telefono_doc`, `direccion_doc`, `departamento_doc`, `activo`, `ROL_id_rol`) VALUES ('$nombre', '$apellido', '$jvpo', '$genero', '$fechana', '$password', '$telefono', '$direccion', '$departamento', '1', '1');";

mysql_query($query);

echo $nombre;
 ?>