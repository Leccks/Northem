<?php
session_start();
include("PHP/conexion.php");
if (isset($_POST["user"]) && isset($_POST["pass"])){
  $user =$_POST['user'];
  $password =$_POST['pass'];
  $query = "select user,password,money from accounts where user='$user' and password='$password'";
  $envio = $conexion->query($query);
  if($envio->num_rows != 0){
    $_SESSION['user']=$user;
    $_SESSION['carrito'] = array();
	}else{
    header("location: login.php?wrong=true");
  }
}
if (empty($_SESSION['user'])){
  $button2 = '<a>SOPORTE</a>';
  $button1 = '<a>ACERCA DE</a>';
}else{
  $query = "select admin,money,profile_img from accounts a inner join user_config b on a.id=b.user_id where user='".$_SESSION['user']."'";
  $envio = $conexion->query($query);
  while($recive = $envio->fetch_assoc()){
    $money = $recive['money'];
    $profile_img = $recive['profile_img'];
    if($recive['admin']==1){
      $button2 = '<a href="users.php" style="color: rgb(201, 201, 201); text-decoration: none;">USERS</a>';
      $button1 = '<a href="apptable.php" style="color: rgb(201, 201, 201); text-decoration: none;">APPS</a>';
    }else{
      $button2 = '<a>SOPORTE</a>';
      $button1 = '<a>ACERCA DE</a>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="CSS/styles.css">
    <meta charset="utf-8">
    <!--Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Bootstrap -->
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
                      <a href="cart.php">Mi carrito</a>
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

    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th>APP_ID</th>
          <th>NAME</th>
          <th>PRICE</th>
          <th>DEVELOPER</th>
          <th>EDITOR</th>
          <th>RELEASE DATE</th>
          <th>MEDIA LOCATION</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <?php
        $query = "select * from game_list gl inner join game_img gi on gl.app_id=gi.app_id;";
        $envio = $conexion->query($query);
        while($recive = $envio->fetch_assoc()){
          echo "<tr>";
          echo "<td name='app_id'>".$recive['app_id']."</input>";
          echo "</td>";
          echo "<td>";
          echo  $recive['app_name'];
          echo "</td>";
          echo "<td>";
          echo  "ARS$ ".$recive['price'].",00";
          echo "</td>";
          echo "<td>";
          echo  $recive['dev'];
          echo "</td>";
          echo "<td>";
          echo  $recive['edit'];
          echo "</td>";
          echo "<td>";
          echo  $recive['launch'];
          echo "</td>";
          echo "<td>";
          echo  $recive['location'].$recive['media_name'];
          echo "</td>";
          echo "<td>";
          echo "<a href='deleteapp.php?app_id=".$recive['app_id']."'>&#10006</a>";
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </table>

  </body>
</html>
