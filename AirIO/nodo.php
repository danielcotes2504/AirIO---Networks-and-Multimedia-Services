<html>

<head>
    <title>Dispositivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script>
        src = "main.js"
    </script>
</head>
<nav class="navbar navbar-expand-lg navbar-light color">

    <header> <a class="navbar-brand" id="logo">Air.io</a> </header>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="info.php">¿Quiénes somos?<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="seleccion.php">Ver Dispositivo</a>
            </li>

        </ul>

        <button onclick="location.href='logout.php'" class="btn mover color" type="button"> Cerrar sesión</button>

    </div>
</nav>

<body class="seleccion">

    <?php
    session_start();
    $us = $_SESSION['usuario'];
    if ($us == "") {
        header("Location: index.php");
    }


    //$nd = $_POST["nodo"];
   // $_SESSION['nodo'] = $nd;
    $nodo = $_SESSION['nodo'];
    // $var = $_POST["variable"];
    // $nodo = "prueba";
    $var = "temperatura";
    $var2 = "humedad_aire";
    $var3 = "concentracion_co2";
    $var4 = "prueba";
    $var5 = "prueba2";
    $var6 = "prueba3";
    ?>
    

    <div class="container">
    <br>
    <h2>Ver dispositivo</h2>
        <h3>Información del dispositivo: <?php echo $nodo; ?> </h3>
        <div class="row">

            <div class="col-md-3" id="colCard" onclick="location.href='chartTemperatura.php'">
                <p>Temperatura</p>
                <?php
                if (strcmp($nodo, $var4) === 0) {

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=[ubidotsToken]";
                } else if (strcmp($nodo, $var5) === 0) {

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=[ubidotsToken]";
                } else if (strcmp($nodo, $var6) === 0) {

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=[ubidotsToken]";
                }

               
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");
                }
                curl_close($curl);
                //echo $respuesta;
                $resp = json_decode($respuesta);
                $result = $resp->results;


                $j = $result[0];
                $valor = $j->value;
                $time = $j->timestamp;

                echo "<h2>$valor C°</h2>";


                ?>
                <br>
            </div>

            <div class="col-md-3" id="colCard" onclick="location.href='chartHumedad.php'">
                <p>Humedad en el aire</p>
                <?php
                if(strcmp($nodo,$var4)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var2/values?token=[ubidotsToken]";

                }else if(strcmp($nodo,$var5)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var2/values?token=[ubidotsToken]";

                }else if(strcmp($nodo,$var6)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var2/values?token=[ubidotsToken]";

                }              
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");
                }
                curl_close($curl);
                //echo $respuesta;
                $resp = json_decode($respuesta);
                $result = $resp->results;


                $j = $result[0];
                $valor = $j->value;
                $time = $j->timestamp;

                echo "<h2>$valor%</h2>";


                ?>

                <br>

            </div>
            <div class="col-md-3" id="colCard" onclick="location.href='chartCO2.php'">
                <p>Concentración de CO2</p>
                <?php
               if(strcmp($nodo,$var4)===0){

                $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var3/values?token=[ubidotsToken]";

            }else if(strcmp($nodo,$var5)===0){

                $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var3/values?token=[ubidotsToken]";

            }else if(strcmp($nodo,$var6)===0){

                $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var3/values?token=[ubidotsToken]";

            }              
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");
                }
                curl_close($curl);
                //echo $respuesta;
                $resp = json_decode($respuesta);
                $result = $resp->results;


                $j = $result[0];
                $valor = $j->value;
                $time = $j->timestamp;

                echo "<h2>$valor</h2>";


                ?>
            </div>

        </div>
        <h3>Alertas generadas: <?php echo $nodo; ?> </h3>
        <div class="row">

            <div class="col-md-3" id="colCard">
                <p>Temperatura</p>
                <?php
               if(strcmp($nodo,$var4)===0){

                $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=[ubidotsToken]";

            }else if(strcmp($nodo,$var5)===0){

                $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=[ubidotsToken];

            }else if(strcmp($nodo,$var6)===0){

                $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var/values?token=[ubidotsToken]";

            }              
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");
                }
                curl_close($curl);
                //echo $respuesta;
                $resp = json_decode($respuesta);
                $result = $resp->results;


                $j = $result[0];
                $valor = $j->value;
                $time = $j->timestamp;

                if ($valor >= 29) {
                    echo "<h2>Temperatura caliente</h2> 
                    <p>Intenta activar el aire acondicionado</p>";
                }
                if ($valor <= 18) {
                    echo "<h2>Temperatura fria</h2> 
                    <p>Intenta activar la calefacción</p>";
                }
                if ($valor>18 && $valor<29)
                {
                    echo "<h2>Temperatura óptima</h2> 
                    <p>No hay acciones por realizar</p>"; 
                }



                ?>
                <br>
            </div>

            <div class="col-md-3" id="colCard">
                <p>Humedad en el aire</p>
                <?php
                if(strcmp($nodo,$var4)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var2/values?token=[ubidotsToken]";

                }else if(strcmp($nodo,$var5)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var2/values?token=[ubidotsToken]";

                }else if(strcmp($nodo,$var6)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var2/values?token=[ubidotsToken]";

                }              
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");
                }
                curl_close($curl);
                //echo $respuesta;
                $resp = json_decode($respuesta);
                $result = $resp->results;


                $j = $result[0];
                $valor = $j->value;
                $time = $j->timestamp;

                if ($valor >= 60) {
                    echo "<h2>Humedad muy alta</h2> 
                    <p>Humidificador desactivado</p>";
                }
                if ($valor <= 40) {
                    echo "<h2>Humedad baja</h2> 
                    <p>Humidificador activado</p>";
                }
                if ($valor > 40 && $valor < 60) {
                    echo "<h2>Humedad óptima</h2> 
                    <p>No hay acciones por realizar</p>";
                }

                ?>

                <br>

            </div>
            <div class="col-md-3" id="colCard">
                <p>Concentración de CO2</p>
                <?php
                if(strcmp($nodo,$var4)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var3/values?token=[ubidotsToken]";

                }else if(strcmp($nodo,$var5)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var3/values?token=[ubidotsToken]";

                }else if(strcmp($nodo,$var6)===0){

                    $url_rest = "https://things.ubidots.com/api/v1.6/devices/$nodo/$var3/values?token=[ubidotsToken]";

                }              
                $curl = curl_init($url_rest);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                if ($respuesta === false) {
                    curl_close($curl);
                    die("Error...");
                }
                curl_close($curl);
                //echo $respuesta;
                $resp = json_decode($respuesta);
                $result = $resp->results;


                $j = $result[0];
                $valor = $j->value;
                $time = $j->timestamp;

                if ($valor ==1) {
                    echo "<h2>CO2 detectado</h2> 
                    <p>Filtro de aire activado</p>";
                }
                if ($valor == 0) {
                    echo "<h2>Condiciones del aire óptimas</h2> 
                    <p>No hay acciones por realizar</p>";
                }


                ?>
            </div>

        </div>
    </div>
    <br>




</body>

</html>