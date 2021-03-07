<!DOCTYPE HTML>
<html>

<head>
<title>Dispositivo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script>src="main.js"</script>
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
    $nodo= $_SESSION['nodo'];
   //$_POST['nodo'] = $nodo;
  
   // $var = $_POST["variable"];+
   $var= "humedad_aire";
    $var4 = "prueba";
    $var5 = "prueba2";
    $var6 = "prueba3";
    ?>
<script>
    window.onload = function() {
var nodo= '<?php echo $nodo;?>';
var variable='<?php echo $var;?>';
var token;
if(nodo=="prueba")
{
  token="[ubidotsToken]";
}
if(nodo=="prueba2")
{
  token="[ubidotsToken]";
}
if(nodo=="prueba3")
{
  token="[ubidotsToken]";
}
      var dataPoints = [];

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        zoomEnabled: true,
        title: {
          text: "Humedad vs Tiempo",
          fontFamily: "Open Sans",
          
        },
        axisY: {
          
          fontFamily: "Open Sans",
          suffix: "%"
        },
        data: [{
          type: "line",
          yValueFormatString: "#,##%",
          dataPoints: dataPoints
        }]
      });

      function addData(data) {
        var dps = data.results;
        for (var i = 0; i < dps.length; i++) {
          var j = dps[i];
          var valor = j.value;
          var fecha = new Date(j.timestamp);
          dataPoints.push({
            x: fecha,
            y: valor
          });
        }
        chart.render();
      }

      
      $.getJSON("https://things.ubidots.com/api/v1.6/devices/"+nodo+"/"+variable+"/values?token="+token, addData)
      
      console.log(nodo +" "+ variable);
    }
  </script>
 <a href="nodo.php" id="volver-bc">Volver</a>
  <br>
  <div class="container">
  <div class="row">
    <div class="col">
    
    </div>
    
    <div class="col-md-8" id="Graph">
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    
    </div>
    <div class="col">
     
    </div>
  </div>
  <br>
  <div class="row"
  >
    <div class="col">
    
    </div>
    <div class="col-md-8" id="Graph">
    
        <h3>Datos del dispositivo <?php echo $nodo; ?> y la variable <?php echo $var; ?> </h3>
    <table class="table table-striped">
        <tr>
            <th scope="col">Humedad</th>
            <th scope="col">Fecha</th>
        </tr>
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
        $tam = count($result);
        for ($i = 0; $i < $tam; $i++) {
            $j = $result[$i];
            $valor = $j->value;
            $time = $j->timestamp;
            $timestamp_in_seconds =$time/1000;
            date_default_timezone_set("America/Bogota");
            $fecha = date('d/m/Y H:i:s', $timestamp_in_seconds);
            
            echo "<tr><td>$valor%</td><td>$fecha</td></tr>";
        }
        ?>
    </table>
    </div>
    <div class="col">
    
    </div>
  </div>
</div>
  
  <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
  <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>

</html>