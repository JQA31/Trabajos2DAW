<?php
    require_once "configdb.php";

    //Toma de datos del formulario
    $username = empty(trim($_POST["username"])) ? "Vacio" : $_POST["username"];
    $contraseña = empty(trim($_POST["password"])) ? "Vacio" : $_POST["password"];
    $interests = isset($_POST["interests"]) ? $_POST["interests"] : [];
    $country = $_POST["country"];

    //Conexion con la base de datos
    $conexion = new mysqli($servidor, $usuario, $password, $basedatos);

    //Consulta para introducir un usuario nuevo
    $introducirUsuario = "INSERT INTO Usuarios(nombre,password,pais) VALUES ('$username','$contraseña','$country')";

    //Comprobaciones de que nada este vacio
    if($username=="Vacio" || $contraseña=="Vacio" || $country==""){
        echo "<h1>Error: no se ha rellenado el formulario correctamente </h1>";
        echo "<h2><a href='index.php'>Volver a la pagina de inicio</a></h2>";
        exit();
    }

    $conexion->query($introducirUsuario);

    $idUsuario = $conexion->insert_id;

    //Introducir Intereses
    foreach($interests as $interes){
        $conexion->query("INSERT INTO Usuarios_Intereses(idUsuario,idInteres) VALUES (".$idUsuario.",$interes)");
    }

    //Consultas
    $consultarUsuario = "SELECT nombre,password,pais FROM Usuarios WHERE id = $idUsuario";
    $consultarIntereses = 
    "SELECT Intereses.nombre 
        FROM Intereses
            INNER JOIN Usuarios_Intereses
                ON Intereses.id = Usuarios_Intereses.idInteres
                    INNER JOIN usuarios
                        ON usuarios_intereses.idUsuario = $idUsuario
                            GROUP BY intereses.nombre;";
    $consultaPais = 
    "SELECT Paises.nombre 
        FROM Paises 
            INNER JOIN Usuarios 
                ON usuarios.pais = Paises.id
                    WHERE usuarios.id = $idUsuario";

    //Recoger Datos de la base de datos
    $datosUsuario = mysqli_fetch_assoc($conexion->query($consultarUsuario));
    $datosIntereses = $conexion->query($consultarIntereses);
    $datosPais = mysqli_fetch_assoc($conexion->query($consultaPais));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php

        echo "<header><h1>DATOS INTRODUCIDOS</h1></header>";

        if($username!="Vacio")
            echo "Nombre de Usuario: ".$username."<br>";
        
        if($password!="Vacio")
            echo "Contraseña: ".$contraseña."<br>";

        if($country!="")
            echo "Pais: ".$country."<br>";
        
        if(!empty($interests))
        {
            echo "Intereses: ";
            foreach ($interests as $interest) {
                echo $interest . " ";
            }
        }

        echo "<header><h1>DATOS DE LA BASE DE DATOS</h1></header>";

        echo "Nombre: ".$datosUsuario["nombre"]."<br>";
        echo "Contraseña: ".$datosUsuario["password"]."<br>";
        echo "Pais: ".$datosPais["nombre"]."<br>";
        if(!empty($interests))
        {
            echo "Intereses: ";
            while($fila = mysqli_fetch_assoc($datosIntereses)){
                foreach($fila as $clave => $valor){
                    echo $valor.", ";
                }
            }
        }
        

        $conexion->close();
    ?>

</body>
</html>