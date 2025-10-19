<?php
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $basedatos = "Prueba1";

    $conexion = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    $consulta = 'Select * FROM Paises;';

    $resultado = $conexion->query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header><h1>Prueba con Base de Datos</h1></header>

    <form action="script.php" method="POST">

        <span>País:</span>
        <select name="country">
            <option value="">Seleccione una opción</option>
            <?php
                if(mysqli_num_rows($resultado)>0){
                    while($fila = mysqli_fetch_array($resultado)){
                        echo '<option value='.$fila["id"].'>'.$fila["nombre"].'</option>';
                    }
                }
            ?>
        </select>

        <input type="submit">
    </form>
</body>
</html>