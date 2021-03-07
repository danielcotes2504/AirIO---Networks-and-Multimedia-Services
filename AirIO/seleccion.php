<!DOCTYPE html>
<html>

<head>
    <title>Proyecto IoT - seleccion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
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

            <li class="nav-item active ">
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
    ?>

    <?php
    if (isset($_POST['enviar'])) {

        $nd = $_POST['nodo'];
        session_start();
        $_SESSION['nodo'] = $nd;
        header("Location: nodo.php");
    }

    ?>
    <br>


    <div class="container">
        <div class="row">

            <div class="col">

            </div>
            <div class="col-6">
                <h2>Ver dispositivo</h2><br>



                </form>

            </div>
            <div class="col">

            </div>
        </div>
        <div class="row">

            <div class="col">

            </div>
            <div class="col-6" id="tarjetaSeleccion">

                <form action="seleccion.php" method="POST"> <br>

                    Nombre del dispositivo<br><input type="text" name="nodo" style="border:none;box-shadow: 0.5px 2px 6px #A2A0A0;"><br><br>
                    <!--VARIABLE: <input type="text" name="variable"><br><br>-->
                    <input type="submit" name="enviar" style="padding:5px 30px 5px 30px;" value="Añadir">
                </form>

            </div>
            <div class="col">

            </div>
        </div>
    </div>

</body>

</html>