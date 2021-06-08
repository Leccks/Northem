 <?php
$dataCon = new mysqli("localhost","root","");
$query = "SHOW DATABASES LIKE 'Northem'";
$envio = $dataCon->query($query);
if($envio->num_rows == 0){
  $query = "create database Northem";
  $dataCon->query($query);
  $dataCon = new mysqli("localhost","root","","Northem");
  $query = "create table accounts(id integer NOT NULL AUTO_INCREMENT,user varchar(40),mail varchar(50),country varchar(30),birth date,
    password varchar(30),money double,admin bit,PRIMARY KEY(id))";
  $dataCon->query($query);
  $query = "create table user_apps(user_id integer NOT NULL , app_name varchar(50))";
  $dataCon->query($query);
  $query = "create table user_config(user_id integer NOT NULL AUTO_INCREMENT, bck varchar(20), profile_img varchar(20), dsc varchar(20),PRIMARY KEY(user_id))";
  $dataCon->query($query);
  $query = "create table game_list(app_id integer NOT NULL AUTO_INCREMENT,app_name varchar(50),price double,app_desc varchar(300),dev varchar(40),edit varchar(40),launch date,PRIMARY KEY(app_id))";
  $dataCon->query($query);
  $query = "create table game_req(app_id integer NOT NULL AUTO_INCREMENT,amd_gpu varchar(40),nvidia_gpu varchar(40),amd_cpu varchar(40),intel_cpu varchar(40),so varchar(40),ram varchar(30),sto varchar(5),PRIMARY KEY(app_id))";
  $dataCon->query($query);
  $query = "create table game_img(app_id integer NOT NULL AUTO_INCREMENT, location varchar(40),media_name varchar(30),PRIMARY KEY(app_id))";
  $dataCon->query($query);
  include("inserts.php");
}
$conexion = new mysqli("localhost","root","","Northem");
?>
