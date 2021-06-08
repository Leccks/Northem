<?php
  session_start();
  for($i = count($_SESSION['carrito']) - 1; $i >= 0; $i--) {
    if($_SESSION['carrito'][$i] == $_GET['index']) {
       unset($_SESSION['carrito'][$i]);
       header('Location: cart.php');
    }
}
?>
