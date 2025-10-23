<?php
    require_once "configdb.php";

    $consulta = "SELECT * FROM Paises";
    $consultaIntereses = "SELECT * FROM Intereses";

    // Conectamos con la nueva base de datos
    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);

    //Ejecutamos la consulta para obtener los datos de la tabla
    $resultado = $conexion->query($consulta);

    $resultadoIntereses = $conexion->query($consultaIntereses);

    // Cerramos la conexión
    $conexion->close();

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

        <label>Nombre de usuario:</label>
        <input type="text" name="username" >

        <label>Contraseña:</label><br>
        <input type="password" name="password" > 

        <span>Intereses:</span>
            <?php
                if(mysqli_num_rows($resultadoIntereses)>0){
                    while($fila = mysqli_fetch_assoc($resultadoIntereses)){
                        echo '<div class="boxes">';
                        echo '<input type="checkbox" name="interests[]" value="'.$fila["id"].'">';
                        echo $fila["nombre"];
                        echo "</div>";
                    }
                }
            ?>

        <span>País:</span>
        <select name="country">
            <option value="">Seleccione una opción</option>
            <?php
                if(mysqli_num_rows($resultado)>0){
                    while($fila = mysqli_fetch_assoc($resultado)){
                        echo '<option value='.$fila["id"].'>'.$fila["nombre"].'</option>';
                    }
                }
            ?>
        </select>

        <input type="submit">
    </form>
</body>
</html>