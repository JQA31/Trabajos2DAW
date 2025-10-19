<?php
    $country = $_POST["country"];
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
    <header>
        <h1>Datos Recibidos</h1>
    </header>

    <?php
        if($country!="")
            echo "Pais: ".$country."<br>";
    ?>
    
</body>
</html>