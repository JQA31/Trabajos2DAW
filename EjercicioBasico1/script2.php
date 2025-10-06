<?php
    require_once "CalculadoraV2.php";

    $calc = new CalculadoraV2($_POST["n1"],$_POST["n2"]);

    $operacion = $_POST["operacion"];
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];

    switch($operacion) {
        case "sumar":
            $resultado = $calc->sumar($n1, $n2);
            break;
        case "restar":
            $resultado = $calc->restar($n1, $n2);
            break;
        case "multiplicar":
            $resultado = $calc->multiplicar($n1, $n2);
            break;
        case "dividir":
            $resultado = $calc->dividir($n1, $n2);
            break;
        default:
            break;
    }

    echo "<h1>Resultado: ".$resultado."</h1>";
?>