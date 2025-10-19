<?php
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    //$basedatos = "Prueba1";

    //$conexion = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    $eliminarBBDD = "DROP DATABASE IF EXISTS Prueba1";

    $crearBBDD = "CREATE DATABASE IF NOT EXISTS Prueba2";

    $crearTabla = "CREATE TABLE IF NOT EXISTS Paises (
        id char(3) PRIMARY KEY, 
        nombre varchar(50) NOT NULL
    )";

    $insertarDatos = "INSERT INTO Paises VALUES 
        ('PE','Peru'),
        ('CO','Colombia'),
        ('MX','Mexico'),
        ('AR','Argentina'),
        ('ES','España'),
        ('CL','Chile')";

    $consulta = "SELECT * FROM Paises";

    //! Eliminamos y creamos las bases de datos
    // $conexion->query($eliminarBBDD);
    // $conexion->query($crearBBDD);

    // Conectamos con la nueva base de datos
    $conexion = new mysqli($servidor, $usuario, $contraseña, "Prueba2");

    // Creamos la tabla e insertamos los datos
    $conexion->query($crearTabla);
    //?$conexion->query($insertarDatos);

    //Ejecutamos la consulta para obtener los datos de la tabla
    $resultado = $conexion->query($consulta);

    // Cerramos la conexión
    $conexion->close();

    if(mysqli_num_rows($resultado)>0){
        while($fila = mysqli_fetch_array($resultado)){
            echo $fila["id"]." - ".$fila["nombre"].'<br>';
        }
    }
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