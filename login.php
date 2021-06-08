<?php
session_start();
include("PHP/conexion.php");
if (empty($_SESSION['user'])){
}else{
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="CSS/styles.css">
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
    <link rel="icon" href="favicon.png">
  </head>
  <body class="background">

      <header class="headerStyle">
        <div class="headerCont">
          <div class="headerArea1">
            <a href="index.php"><img src="Images/globalheader.png"></img></a>
          </div>
          <div class="headerArea2">
            <div class="headerButtons">
              <a>MI CUENTA</a>
              <a>COMUNIDAD</a>
              <a>ACERCA DE</a>
              <a>SOPORTE</a>
            </div>
          </div>
          <div class="headerArea3">
            <a href="login.php" class="iniciarSesion">Iniciar Sesión</a>
          </div>
        </div>
      </header>

      <?php
      if(isset($_GET["wrong"]) && $_GET["wrong"] == 'true'){
        echo '<div class="logError"><a>El nombre de la cuenta y/o la contraseña que has introducido son incorrectos.</a></div>';
      }
      ?>
      <div class="logForm">
        <form method="post" action="index.php" class="logFormArea1">
          <a class="subTitle logPos">INICIAR SESIÓN</a>
          <a class="textStyle2 logPos2">en una cuenta existente</a>
          <a class="textStyle2 logPos3">Nombre de la cuenta</a>
          <input type="text" class="inputStyle logPos2" name="user" required/>
          <a class="textStyle2 logPos">Contraseña</a>
          <input type="password" class="inputStyle logPos2" name="pass" required/>
          <button type="submit" class="submitStyle logPos4">Iniciar Sesión</button>
        </form>
        <div class="logFormArea3"></div>
        <div class="logFormArea2">
          <a class="subTitle logPosB">CREAR</a>
          <a class="textStyle2 logPos2">una nueva cuenta.</a>
          <a class="textStyle2 logPos3">Unirse es gratis y su uso, sencillo.
             Continúa para crear tu cuenta y descargar Northem,
              la solución digital líder entre los jugadores de PC.</a>
          <form action="register.php">
            <input class="submitStyle logPos2B" type="submit" value="Crear cuenta" />
          </form>
        </div>
      </div>
  </body>
</html>
