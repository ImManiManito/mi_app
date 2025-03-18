<?php
class Contacto {
    var $id;
    var $nombre;
    var $telefono;
    var $correo;

    function alta(){
        include_once("conexion.php");
        $con=new Conexion();
        $conn=$con->conectar();
        $query="INSERT into contacto(nombre, telefono, correo)
                values ('$this->nombres', '$this->telefono', '$this->correo)";
        $stmt=$com->prepare($query);
        return $stmt->execute();
    }

    function eliminar(){
        include_once("conexion.php");
        $conn = new Conexion();
        $db = $conn->conectar();

        $query="DELETE from contacto WHERE id = '$this->id'";
        $stmt=$com->prepare($query);
        return $stmt->execute();
    }

    function listar() {
        include_once("conexion.php");
        $conn = new Conexion();
        $db = $conn->conectar();
        
        $query = "SELECT * FROM contacto;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $datos = [];
        while ($dato = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contacto = new Contacto();
            $contacto->id = $dato["id"];
            $contacto->nombre = $dato["nombre"];
            $contacto->telefono = $dato["telefono"];
            $contacto->correo = $dato["correo"];
            $datos[] = $contacto;
        }
        
        return $datos;
    }
}
?>
