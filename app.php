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
if(isset($_GET["app_id"])){
  $query= "select * from game_list gl inner join game_img gi on gl.app_id = gi.app_id inner join game_req gr on gi.app_id = gr.app_id where gl.app_id=".$_GET["app_id"].";";
  $envio = $conexion->query($query);
  while($recive = $envio->fetch_assoc()){
    $app_id = $recive['app_id'];
    $title = $recive['app_name'];
    $desc = $recive['app_desc'];
    $price = $recive['price'];
    $location = $recive['location'];
    $media_name = $recive['media_name'];
    $portrait = $location.$media_name.".png";
    $launch = $recive['launch'];
    $lday = substr($launch,8,2);
    $lmonth = substr($launch,5,2);
    $lyear = substr($launch,0,4);
    $dev = $recive['dev'];
    $edit = $recive['edit'];
    $so = $recive['so'];
    $amdc = $recive['amd_cpu'];
    $intelc = $recive['intel_cpu'];
    $amdg = $recive['amd_gpu'];
    $nvidiag = $recive['nvidia_gpu'];
    $ram = $recive['ram'];
    $sto = $recive['sto'];
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
    <title><?php echo $title;?> en Northem</title>
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

      <div class="center">
        <div class="mainContentApp">
          <div class="dropdownCont">
            <div class="dropdown">
              <button class="dropbtn" style="">Tu tienda</button>
              <div class="dropdown-content">
                <a href="#">Pay to Play</a>
                <a href="#">Free to Play</a>
                <a href="#">Demos</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Juegos</button>
              <div class="dropdown-content">
                <a href="#">Pay to Play</a>
                <a href="#">Free to Play</a>
                <a href="#">Demos</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Software</button>
              <div class="dropdown-content">
                <a href="#">Pay to Play</a>
                <a href="#">Free to Play</a>
                <a href="#">Demos</a>
              </div>
            </div>
          </div>

        <a class="conTitle" style="color:rgb(114,129,141)">Todos los juegos > TAGS WIP > <?php echo $title;?></a>
        <a class="imgTitle"><?php echo $title;?></a>

        <div class="appCont">
          <div class="highlight">
            <div class="show">
              <img class="imgShow" id="id-show" src="<?php echo $location.$media_name.'1.jpg';?>"/>
            </div>
            <div class="scroll">
              <?php
              for($index = 1;$index<=8;$index++){
              ?>
              <img class="scrollItems" src="<?php echo $location.$media_name.$index.'.jpg'; ?>" id="id-scr<?php echo $index;?>" onclick="showImage('id-show','id-scr<?php echo $index;?>')"/>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="appInfo">
            <img class="gameImg" src="<?php echo $portrait;?>">
            <p style="margin-top: 5px;"><?php echo $desc;?></p>
            <div class="infoTextCont"><a class="infoText">FECHA DE LANZAMIENTO:</a><a class="light" style="margin-left: 10px">
              <?php if($lmonth="01"){
              echo $lday." ENE ".$lyear;
            }else if($lmonth="02"){
              echo $lday." FEB ".$lyear;
            }else if($lmonth="03"){
              echo $lday." MAR ".$lyear;
            }else if($lmonth="04"){
              echo $lday." ABR ".$lyear;
            }else if($lmonth="05"){
              echo $lday." MAY ".$lyear;
            }else if($lmonth="06"){
              echo $lday." JUN ".$lyear;
            }else if($lmonth="07"){
              echo $lday." JUL ".$lyear;
            }else if($lmonth="08"){
              echo $lday." AGO ".$lyear;
            }else if($lmonth="09"){
              echo $lday." SEP ".$lyear;
            }else if($lmonth="10"){
              echo $lday." OCT ".$lyear;
            }else if($lmonth="11"){
              echo $lday." NOV ".$lyear;
            }else if($lmonth="12"){
              echo $lday." DIC ".$lyear;
            }else{
              echo "undefined";
            }?>
            </a></div>
            <div class="infoTextCont"><a class="infoText">DESARROLLADOR:</a><a style="margin-left: 20px"><?php echo $dev;?></a></div>
            <div class="infoTextCont" style="margin-top: 2.5px;"><a class="infoText">EDITOR:</a><a  style="margin-left: 70px"><?php echo $edit;?></a></div>
          </div>
        </div>

        <div class="appCenter">
          <div class="gameInfoCont">
            <div class="purchaseOptions">
              <div class="purchase">
                <div class="purchaseArea1">
                  <a style="margin-top: -10px;">Comprar <?php echo $title;?></a>
                </div>
                <div class="purchaseArea2">
                  <div class="purchaseButtonCont">
                    <div style="display: flex; align-items: center; justify-content: center;width: 45%;">
                      <?php
                        if($price==0){
                          echo "<a>Free to Play</a>";
                        }else{
                          echo "<a>ARS$ ".$price.',00</a>';
                        }
                      ?>
                    </div>
                    <a class="purchaseButton"href="cart.php?app_id=<?php echo $app_id;?>">
                      Añadir al carrito
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="gameDescription">
              <a>REQUISITOS DEL SISTEMA</a>
              <div class="separador"></div>
              <div class="reqCont" style="margin-top: 10px;">
                <a style="color:rgb(234,196,255);">RECOMENDADO:</a>
              </div>
              <div class="reqCont" style="margin-top: 5px;">
                <a class="gameReq">SO: </a><a>
                  <?php
                    if($so==null){
                      echo "TBD";
                    }else{ echo $so;}?></a>
              </div>
              <div class="reqCont">
                <a class="gameReq">Procesador: </a><a>
                  <?php
                    if($intelc==null && $amdc==null){
                      echo "TBD";
                    }else{echo $intelc." o ".$amdc;}
                  ?></a>
              </div>
              <div class="reqCont">
                <a class="gameReq">Memoria: </a><a>
                  <?php
                    if($ram==null){
                      echo "TBD";
                    }else{echo $ram." de RAM";}
                  ?>
                  </a>
              </div>
              <div class="reqCont">
                <a class="gameReq">Gráficos: </a><a>
                  <?php
                    if($nvidiag==null && $amdg==null){
                      echo "TBD";
                    }else{echo $nvidiag." o ".$amdg;}
                  ?>
                </a>
              </div>
              <div class="reqCont">
                <a class="gameReq">Almacenamiento: </a><a>
                  <?php
                    if($sto==null){
                      echo "TBD";
                    }else{echo $sto." de espacio disponible";}
                  ?>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
      <script>
        function showImage(target,replacement){
          document.getElementById(target).src = document.getElementById(replacement).src;
        }
      </script>
  </body>
</html>
