<?php
session_start();
include("PHP/conexion.php");
if (empty($_SESSION['user'])){
  header("Location:index.php");
}else{
  $query = "select admin from accounts where user='".$_SESSION['user']."'";
  $envio = $conexion->query($query);
  while($recive = $envio->fetch_assoc()){
    if($recive['admin']!=1){
      header("Location:index.php");
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Bootstrap -->
    <title>Bienvenidos a Northem</title>
    <link rel="icon" href="favicon.png">
    <style>
    .headerStyle{color: rgb(201, 201, 201);
      background-color: rgb(32, 34, 37);
      height: 110px;
      width: 100%;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;}
      .headerCont{
        /*background-color: red;*/
        font-family: Tahoma;
        height: 110px;
        width: 940px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;}
        .headerArea1{
          width: 60%;
          height: 100%;
          /*background-color: blue;*/
          display: flex;
          justify-content: flex-start;
          align-items: center;
        }
        .headerArea2{
          width: 100%;
          height: 100%;
          /*background-color: pink;*/
          display: flex;
          flex-direction: row;
          justify-content: center;
          align-items: center;}
          .headerButtons{
            /*background-color: yellow;*/
            display: flex;
            flex-direction: row;
            height: 15px;
            width: 400px;;
            font-size: 14px;
            align-items: center;
            justify-content: space-around;
          }
        .headerArea3{
          width: 60%;
          height: 100%;
          /*background-color: yellow;*/
          display: flex;
          justify-content: flex-end;
          align-items: center;
        }
        .headerStyle{color: rgb(201, 201, 201);
          background-color: rgb(32, 34, 37);
          height: 110px;
          width: 100%;
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: center;}
          .headerCont{
            /*background-color: red;*/
            font-family: Tahoma;
            height: 110px;
            width: 940px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;}
            .headerArea1{
              width: 60%;
              height: 100%;
              /*background-color: blue;*/
              display: flex;
              justify-content: flex-start;
              align-items: center;
            }
            .headerArea2{
              width: 100%;
              height: 100%;
              /*background-color: pink;*/
              display: flex;
              flex-direction: row;
              justify-content: center;
              align-items: center;}
              .headerButtons{
                /*background-color: yellow;*/
                display: flex;
                flex-direction: row;
                height: 15px;
                width: 400px;;
                font-size: 14px;
                align-items: center;
                justify-content: space-around;
              }
            .headerArea3{
              width: 60%;
              height: 100%;
              /*background-color: yellow;*/
              display: flex;
              justify-content: flex-end;
              align-items: center;
            }

            .background{
              width: 100%;
              height: 100%;
              background-color: rgb(47, 49, 54);
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: center;
            }
      table, th, td{
        border: 0.5px solid white;
        text-align: center;
      }
      p{color: white;
        font-size: 30px;
        text-align: center;
      }
    </style>
  </head>
  <body class="background">
    <div class="background">

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
          </div>
        </div>
      </header>

      <table style="color: white; height: 300px; width: 1000px; margin: auto; margin-top: 3%;">
        <tr>
          <th>ID</th>
          <th>User</th>
          <th>Mail</th>
          <th>Country</th>
          <th>Fecha de nacimiento</th>
          <th>Password</th>
          <th>Admin</th>
          <th>Saldo</th>
        </tr>
          <?php
            $query = "select * from accounts";
            $envio = $conexion->query($query);
            while($recive = $envio->fetch_assoc()){
              echo "<tr>";
              echo "<td>";
              echo  $recive['id'];
              echo "</td>";
              echo "<td>";
              echo  $recive['user'];
              echo "</td>";
              echo "<td>";
              echo  $recive['mail'];
              echo "</td>";
              echo "<td>";
              echo  $recive['country'];
              echo "</td>";
              echo "<td>";
              echo  $recive['birth'];
              echo "</td>";
              echo "<td>";
              echo  $recive['password'];
              echo "</td>";
              echo "<td>";
              if($recive['admin']==1){
                echo "Si";
              }else{
                echo "No";
              }
              echo "</td>";
              echo "<td>";
              echo  "$".$recive['money'];
              echo "</td>";
              echo "</tr>";
            }
          ?>
      </table>
    </div>
    <!--Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Bootstrap -->
  </body>
</html>
