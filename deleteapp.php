<?php
session_start();
include("PHP/conexion.php");
$query = "select admin from accounts where user='".$_SESSION['user']."'";
$envio = $conexion->query($query);
while($recive = $envio->fetch_assoc()){
  if($recive['admin']==1){
    if(isset($_GET["app_id"])){
      $query = "delete gl,gi,gr from game_list gl inner join game_img gi on gl.app_id = gi.app_id inner join game_req gr on gi.app_id = gr.app_id where gl.app_id=".$_GET['app_id']."";
      $envio = $conexion->query($query);
      header("Location: apptable.php");
    }else{
      header("Location: apptable.php");
    }
  }else{
    header("Location: index.php");
  }
}
?>
