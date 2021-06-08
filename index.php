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

      <div class="center">
        <div class="latBar">
          <img src="Images/northemcards_promo.png" style="height: 115px;"/>
          <div class="separador"></div>
          <a class="latBarTitle">TARJETAS DE REGALO</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Ya disponibles en Northem</a>
          <a class="latBarTitle">RECOMENDADOS</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Amigos</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Mentores</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Etiquetas</a>
          <a class="latBarTitle">LISTA DE DESCUBRIMIENTOS</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Recomendaciones</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Novedades</a>
          <a class="latBarTitle">EXPLORAR CATEGORÍAS</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Lo más vendido</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Actualizados recientemente</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Novedades</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Próximamente</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Ofertas</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Realidad virtual</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Compat. con Northem Controller</a>
          <a class="latBarTitle">EXPLORAR POR GÉNERO</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Free to Play</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Acceso anticipado</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Acción</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Aventura</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Carreras</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Casual</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Deportes</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Estrategia</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Indie</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Multijugador masivo</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Rol</a>
          <a class="latBarInfo" style="margin: 5px 0 0 0;">Simuladores</a>
        </div>
        <div class="mainContent">
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

          <a class="conTitle">DESTACADOS Y RECOMENDADOS</a>

          <div class="slideshow-container">

          <?php
          $imgIndex = 0;
          $imgTarget = 0;
          $query = "select * from game_list gl inner join game_img gi on gl.app_id=gi.app_id where gl.app_name IN ('DRAGON BALL Z: KAKAROT','CODE VEIN','GreedFall');";
          $envio = $conexion->query($query);
          while($recive = $envio->fetch_assoc()){
          ?>
          <a href="<?php echo 'app.php?app_id='.$recive['app_id'];?>">
            <div class="mySlides fade">
              <div class="carouselCont">
                <div class="caroulsel1">
                  <img src="<?php echo $recive['location'].$recive['media_name'].'.png';?>" style="width: 620px;
                  height: 400px;" id="id-img<?php echo $imgTarget+=1;?>">
                </div>
                <div class="carousel2">
                  <div class="carouselTitle">
                    <a class="imgTitle"><?php echo $recive['app_name'];?></a>
                  </div>
                  <div class="carouselImgs">
                    <div class="carouselImgArea1">
                      <img src="<?php echo $recive['location'].$recive['media_name'].'1.jpg';?>" class="screenshot bright" id="id-scr<?php echo $imgIndex+=1;?>" onmouseover="changeImg('id-img<?php echo $imgTarget;?>','id-scr<?php echo $imgIndex;?>')"/>
                      <img src="<?php echo $recive['location'].$recive['media_name'].'2.jpg';?>" class="screenshot bright" id="id-scr<?php echo $imgIndex+=1;?>" onmouseover="changeImg('id-img<?php echo $imgTarget;?>','id-scr<?php echo $imgIndex?>')"/>
                    </div>
                    <div class="carouselImgArea2">
                      <img src="<?php echo $recive['location'].$recive['media_name'].'3.jpg';?>" class="screenshot bright" id="id-scr<?php echo $imgIndex+=1;?>" onmouseover="changeImg('id-img<?php echo $imgTarget;?>','id-scr<?php echo $imgIndex;?>')"/>
                      <img src="<?php echo $recive['location'].$recive['media_name'].'4.jpg';?>" class="screenshot bright" id="id-scr<?php echo $imgIndex+=1;?>" onmouseover="changeImg('id-img<?php echo $imgTarget;?>','id-scr<?php echo $imgIndex;?>')"/>
                    </div>
                  </div>
                  <div class="carouselInfo">
                    <a class="imgSubTitle">Ya disponible</a>
                    <div class="tag">Lo más vendido</div>
                    <a class="gamePrice">
                    <?php
                      if($recive['price']==0){
                        echo "Free to Play";
                      }else{
                        echo "ARS$ ".$recive['price'].',00';
                      }
                    ?></a>
                  </div>
                </div>
              </div>
            </div>
          </a>
          <?php
          }
          ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
          </div>

          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
          </div>

          <a class="conTitle">JUEGOS DISPONIBLES</a>
          <div class="gameCont">
            <?php
            $query = "select * from game_list gl inner join game_img gi on gl.app_id=gi.app_id;";
            $envio = $conexion->query($query);
            while($recive = $envio->fetch_assoc()){
            ?>
            <a href="<?php echo 'app.php?app_id='.$recive['app_id'];?>">
              <div class="gameButton">
                <img src="<?php echo $recive['location'].$recive['media_name'].'.png';?>" style="width: 200px;
                height: 90px; margin-top: 15px;"/>
                <a style="margin-top: 1px;"><?php echo $recive['app_name'];?></a>
                <a class="gamePrice" style="margin: 0;">
                  <?php
                    if($recive['price']==0){
                      echo "Free to Play";
                    }else{
                      echo "ARS$ ".$recive['price'].',00';
                    }
                  ?>
                </a>
              </div>
            <?php
            }
            ?>
            </a>
          </div>

      </div>
      <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        }

        function plusSlideAuto(){
          plusSlides(1);
        }

        function changeImg(target,replacement){
          var def = document.getElementById(target).src;
          document.getElementById(target).src = document.getElementById(replacement).src;
          onmouseout = function(){
            document.getElementById(target).src = def;
          }
        }
      </script>
  </body>
</html>
