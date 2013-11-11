<?php

include_once '../clases/db_connect.php';
$idcontacto = (int) $_GET['idcontacto'];
mysql_query("DELETE FROM `contactos` WHERE `idcontacto` = '$idcontacto' ");
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
header("Location: /ONG/private_content/contacto_list.php"); /* Redirect browser */
?>