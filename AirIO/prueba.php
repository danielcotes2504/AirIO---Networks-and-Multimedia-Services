<?php
    session_start();
    $us = $_SESSION['usuario'];
    if ($us == "") {
        header("Location: index.php");
    }
    // $nodo = $_POST["nodo"];
    $nd= $_SESSION['nodo'];
    // $var = $_POST["variable"];
   // $nodo = "prueba";
    $var = "temperatura";
    $var2 = "humedad_aire";
    $var3 = "concentracion_co2";

    echo "<h2>$nd<h2>";
    ?>