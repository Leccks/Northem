<?php
  include("PHP/conexion.php");
  $launch = $_POST['year']."/".$_POST['month']."/".$_POST['day'];
  $query= "insert into game_list(app_name,price,app_desc,dev,edit,launch) values ('" . $_POST['app_name'] . "'," . $_POST['price'] . ",'" . $_POST['app_desc'] . "','" . $_POST['dev'] . "','" . $_POST['edit'] . "','$launch')";
  $conexion->query($query);
  $query= "insert into game_req(amd_gpu,nvidia_gpu,amd_cpu,intel_cpu,so,ram,sto) values ('" . $_POST['amd_gpu'] . "','" . $_POST['nvidia_gpu'] . "','" . $_POST['amd_cpu'] . "','" . $_POST['intel_cpu'] . "','" . $_POST['so'] . "',
  '" . $_POST['ram'] . "','" . $_POST['sto'] . "')";
  $conexion->query($query);
  $query= "insert into game_img(location, media_name) values ('" . $_POST['location'] . "','" . $_POST['media_name'] . "')";
  $conexion->query($query);
  header("Location:index.php");
?>
