<?php
$nombre = $_POST["txtNombre"];
$tel = $_POST["txtTel"];
$correo = $_POST["txtCorreo"];

include_once("Contacto.php");

$contacto = new Contacto();
$contacto->nombre = $nombre;
$contacto->telefono = $tel;
$contacto->correo = $correo;

if ($contacto->alta() > 0) {
    echo "Contacto guardado";
} else {
    echo "Error";
}
?>
