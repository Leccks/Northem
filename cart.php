<?php
session_start();
include("PHP/conexion.php");
if (empty($_SESSION['user'])){
  $button2 = '<a>SOPORTE</a>';
  $button1 = '<a>ACERCA DE</a>';
}else{
  $query = "select admin,money,profile_img from accounts a inner join user_config b on a.id=b.user_id where user='".$_SESSION['user']."'";
  $envio = $conexion->query($query);
  while($recive = $envio->fetch_assoc()){
    if($recive['admin']==1){
      $button2 = '<a href="users.php" style="color: rgb(201, 201, 201); text-decoration: none;">USERS</a>';
      $button1 = '<a href="apptable.php" style="color: rgb(201, 201, 201); text-decoration: none;">APPS</a>';
      $money = $recive['money'];
      $profile_img = $recive['profile_img'];
    }else{
      $button2 = '<a>SOPORTE</a>';
      $button1 = '<a>ACERCA DE</a>';
      $money = $recive['money'];
      $profile_img = $recive['profile_img'];
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="CSS/styles.css">
    <meta charset="utf-8">
    <title>Bienvenidos a Northem</title>
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
            <?php echo $button1;?>
            <?php echo $button2;?>
          </div>
        </div>
        <div class="headerArea3">
          <?php
            if(empty($_SESSION['user'])){
              echo'<a href="login.php" class="iniciarSesion">Iniciar Sesión</a>';
            }else{
              echo'<div class="profileCont">
                <img  style="height:55px;width:55px;border: solid 1px grey;" src="Images/'.$profile_img.'.jpg"/>
                <div class="userInfoCont">
                  <div class="usr">
                    <button class="usr-button">'.$_SESSION['user'].'</button>
                    <div class="usr-content">
                      <a href="profile.php?user='.$_SESSION['user'].'">Mi perfil</a>
                      <a href="logout.php">Cerrar sesión</a>
                    </div>
                  </div>
                  <a>ARS$ '.$money.'</a>
                </div>
              </div>';
            }
          ?>
        </div>
      </div>
    </header>

      <div class="center" style="margin: 0;flex-direction: column; align-items: center;height: 100%;">
        <?php
          if(isset($_GET['app_id'])){
            if(isset($_SESSION['carrito'])){
              if(in_array($_GET['app_id'],$_SESSION['carrito'])){
                header("Location: app.php?app_id=".$_GET['app_id']);
              }else{
                $_SESSION['carrito'][count($_SESSION['carrito'])] = $_GET['app_id'];
              }
            }else{
              $_SESSION['carrito'][count($_SESSION['carrito'])] = $_GET['app_id'];
            }
          }
          if(isset($_SESSION['carrito'])){
            echo count($_SESSION['carrito']);
            $totalprice = 0;
            foreach($_SESSION['carrito'] as $index){
              $query="select * from game_list gl inner join game_img gi on gl.app_id=gi.app_id where gl.app_id=".$index;
              $envio = $conexion->query($query);
              while($recive = $envio->fetch_assoc()){
                $totalprice += $recive['price'];
                $imagen = $recive['location'].$recive['media_name'].'.png';
                echo "<div class='userGameCont'><div><img class='userGameContImg' src='".$imagen."'></div>
                        <div style='display: flex; flex-direction: column;justify-content: space-between; width:75%'>
                          <a class='cartTitle'>".$recive['app_name']."</a>
                          <a class='cartTitle pricePos'>ARS$ ".$recive['price']."</a>
                        </div>
                        <div style='display: flex; justify-content: center; align-items: center;'>
                          <a href='cartDel.php?index=".$index."' style='margin-right: 10px; color: rgb(155, 118, 166);'>&#10006</a>
                        </div>
                      </div>";
              }
            }
          }else{
            echo "<a style='color:white'>El carrito esta vacío.</a>";
            $totalprice = "";
          }
        ?>
        <div style="display: flex; flex-direction: row; width: 100%; align-items: center; margin-top: 5px;">
          <div style="width: 87.3%">
            <?php echo "<a class='cartTitle' style='font-weight: bold;'>PRECIO TOTAL: ARS$ ".$totalprice."</a>";?>
          </div>
          <input class="submitStyle" type="submit" value="Comprar"/>
        </div>
      </div>
  </body>
</html>
