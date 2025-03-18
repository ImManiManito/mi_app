<?php

    include_once("Contacto.php");
    $contacto=new Contacto();
    $contacto->id=$_POST["id"];
    if($contacto->eliminar()>0){
        echo "contacto eliminado";
    }else{
        echo "Error";
    }
?>
