<?php
  session_start();
  include("PHP/conexion.php");
  $query = "select user from accounts where user='".$_POST['user']."'";
  $envio = $conexion->query($query);
  if($envio->num_rows == 0){
    $query = "select mail from accounts where mail='".$_POST['mail']."'";
    $envio = $conexion->query($query);
    if($envio->num_rows == 0){
      if($_POST['mail']==$_POST['verMail']){
        if($_POST['pass']==$_POST['verPass']){
         $birth = $_POST['year']."/".$_POST['month']."/".$_POST['day'];
         $query= "insert into accounts(user,mail,country,birth,password,admin,money) values ('" . $_POST['user'] . "','" . $_POST['mail'] . "','" . $_POST['country'] . "','$birth','" . $_POST['pass'] . "'
         ,0,0)";
         $conexion->query($query);
         $query= "insert into user_config(bck,profile_img,dsc) values ('default_background','default_profile_img','')";
         $conexion->query($query);
         $_SESSION['user']=$_POST['user'];
         header("Location:index.php");
         }else{
           header("Location:register.php?passNoMatch=true");
         }
      }else{
        header("Location:register.php?emailNoMatch=true");
      }
    }else{
      header("Location:register.php?mailAlreadyExists=true");
    }
	}else{
    header("Location:register.php?userAlreadyExists=true");
  }
?>
