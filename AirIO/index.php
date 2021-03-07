<!DOCTYPE html>
<html>

<head>
    <title>Proyecto IoT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="index">
    <?php
    if (isset($_POST['enviar'])) {
        $login = $_POST['login'];
        $password = $_POST['pass'];
        if ($login == "admin" && $password == "1234") {
            session_start();
            $_SESSION['usuario'] = $login;
            header("Location: seleccion.php");
        } else {
            session_start();
            $_SESSION['usuario'] = "";
            header("Location: index.php");
        }
    } else {
    ?>
    <div class="container">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col-6">
    <br>
        <h1 style="text-align:center;">Air.io</h1>
    </div>
    <div class="col">
     
    </div>
  </div>
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col-5" id="Login">
        <br>
    <h2 style="text-align:center;">Iniciar sesión</h2><br>
        <form action="index.php" method="POST" style="text-align:center;">
            <p style="text-align:center; padding-right:8rem; font-weight: 600">Usuario</p> 
            <input type="text" name="login" width="50" style="font-family: 'Open Sans', sans-serif;font-weight: 300; font-size: 16px;color: #505050; padding-left:5px;" ><br><br>
            <p style="text-align:center;padding-right:6rem;font-weight: 600" >Contraseña</p>
            <input type="password" name="pass" width="50" style=" font-size: 16px;color: #505050; padding-left:5px;" ><br><br>
            <input type="submit" name="enviar" value="Iniciar sesión" style="text-align:center;"><br><br>
        </form>
    </div>
    <div class="col">
    
    </div>
  </div>
</div>
        
        
    <?php } ?>
</body>

</html>