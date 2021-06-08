<?php
session_start();
include("PHP/conexion.php");
if (empty($_SESSION['user'])){
  $iniciarSesion = '<a href="login.php" class="iniciarSesion">Iniciar Sesión</a>';
  $button2 = '<a>SOPORTE</a>';
  $button1 = '<a>ACERCA DE</a>';
}else{
  $iniciarSesion = '<a class="iniciarSesion">'.$_SESSION['user'].'</a>
  <a href="logout.php" class="iniciarSesion" style="margin-left: 5px;">cerrar sesión</a>';
  $query = "select admin from accounts where user='".$_SESSION['user']."'";
  $envio = $conexion->query($query);
  while($recive = $envio->fetch_assoc()){
    if($recive['admin']==1){
      $button2 = '<a href="users.php" style="color: rgb(201, 201, 201); text-decoration: none;">USERS</a>';
      $button1 = '<a href="apptable.php" style="color: rgb(201, 201, 201); text-decoration: none;">APPS</a>';
    }else{
      $button2 = '<a>SOPORTE</a>';
      $button1 = '<a>ACERCA DE</a>';
    }
  }
}
if(isset($_GET["user"])){
  $query = "select * from accounts a inner join user_config b on a.id = b.user_id where a.user='".$_GET["user"]."';";
  $envio = $conexion->query($query);
  while($recive = $envio->fetch_assoc()){
    $user = $recive['user'];
    $money = $recive['money'];
    $profile_img = $recive['profile_img'];
    $bck = $recive['bck'];
    $dsc = $recive['dsc'];
    $id = $recive['id'];
  }
}else{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="CSS/styles.css">
    <meta charset="utf-8">
    <title>Northem :: <?php echo $user;?></title>
    <link rel="icon" href="favicon.png">
  </head>
  <body class="background" style="background-color: black;">

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
                      <a href="profile.php?user='.$_SESSION['user'].'">Mi Perfil</a>
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

    <div class="profileBackground" style="background-image:url('Images/<?php echo $bck;?>.jpg');">
      <div class="center" style="margin: 0;flex-direction: column; align-items: center;height: 100%;">
        <div class="profileHeader">
          <div class="profileHeaderArea1"><img class="profileImg" src="Images/<?php echo $profile_img;?>.jpg"/></div>
          <div class="profileHeaderArea2">
            <a class="username"><?php echo $user;?></a>
          </div>
        </div>
        <div class="profileBody">
          <a style="margin: 15px 0 0 15px;">JUEGOS ADQUIRIDOS</a>
          <div class="separador"></div>
          <div class="profileBodyArea1">

            <?php
            $query = "select * from game_list gl inner join game_img gi on gl.app_id=gi.app_id where app_name in (select app_name from user_apps where user_id=".$id.")";
            $envio = $conexion->query($query);
            while($recive = $envio->fetch_assoc()){
            ?>
              <div class="userGameCont">
                <img class="userGameContImg" src="<?php echo $recive['location'].$recive['media_name'].'.png';?>">
                <a style="font-size: 18px;font-weight: lighter;margin: 10px 0 0 10px;"><?php echo $recive['app_name'];?></a>
              </div>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>

  </body>
</html>
