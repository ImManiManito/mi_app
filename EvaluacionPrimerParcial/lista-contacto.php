<html>
<head></head>
<body>
    <?php
    include_once("Contacto.php");
    
    $contacto = new Contacto();
    $arr = $contacto->listar();
    ?>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Operaciones</th>
        </tr>
        <?php foreach ($arr as $c) { ?>
        <tr>
            <td><?php echo $c->id; ?></td>
            <td><?php echo $c->nombre; ?></td>
            <td><?php echo $c->telefono; ?></td>
            <td><?php echo $c->correo; ?></td>
            <td>
                <form action = "eliminar-contacto.php" method="POST">
                    <input type="hidden" value="<?php echo $c->id;?>" name="id">
                    <input type="submit" value="eliminar">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    
            

</body>
</html>
