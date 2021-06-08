<?php
$conexion = new mysqli("localhost","root","","Northem");
$query= "insert into accounts(user,mail,country,birth,password,admin,money) values ('admin','admin@northem.com','Argentina','','admin'
,1,0)";
$conexion->query($query);
$query= "insert into user_config(bck,profile_img) values ('admin_bck_img','admin_profile_img')";

$conexion->query($query);
$query= "insert into game_list(app_name,price,app_desc,dev,edit,launch) values ('CODE VEIN',1799,'Crea tu propio resucitado, forma un equipo y embárcate en un viaje hasta el fin del mundo para descubrir tu pasado y escapar de tu vida de pesadilla en CODE VEIN.','BANDAI NAMCO Studios','BANDAI NAMCO Entertainment','2019/09/26')";
$conexion->query($query);
$query= "insert into game_req(amd_gpu,nvidia_gpu,amd_cpu,intel_cpu,so,ram,sto) values ('Radeon R9 380X','GeForce GTX 960','AMD Ryzen 3 2200G','Intel Core i5-7400','Windows 7/10 (64-bits)',
'8 GB','35 GB')";
$conexion->query($query);
$query= "insert into game_img(location, media_name) values ('Images/','codeVein')";
$conexion->query($query);

$query= "insert into game_list(app_name,price,app_desc,dev,edit,launch) values ('GreedFall',1300,'Adéntrate en una experiencia de rol y decide la suerte de un nuevo mundo que rebosa magia, riquezas, secretos perdidos y criaturas fantásticas. Forma parte de un mundo vivo y en evolución mediante la diplomacia, el engaño y la fuerza: altera el curso de la historia y elige tu propio destino.',
'Spiders','Focus Home Interactive','2019/09/09')";
$conexion->query($query);
$query= "insert into game_req(amd_gpu,nvidia_gpu,amd_cpu,intel_cpu,so,ram,sto) values ('Radeon RX 590','GeForce GTX 980','AMD FX-8300','Intel Core i5-4690','Windows 7/8/10 (64-bits)',
'16 GB','25 GB')";
$conexion->query($query);
$query= "insert into game_img(location, media_name) values ('Images/','greedfall')";
$conexion->query($query);

$query= "insert into game_list(app_name,price,app_desc,dev,edit,launch) values ('DRAGON BALL Z: KAKAROT',1999,'¡Revive la historia de Son Goku y otros Guerreros Z en DRAGON BALL Z: KAKAROT! Conoce el mundo de DRAGON BALL Z no solo por sus épicos combates, sino también mientras luchas, pescas, comes y entrenas con Son Goku, Son Gohan, Vegeta y muchos más.',
'CyberConnect2 Co. Ltd.','BANDAI NAMCO Entertainment','2020/01/16')";
$conexion->query($query);
$query= "insert into game_req(amd_gpu,nvidia_gpu,amd_cpu,intel_cpu,so,ram,sto) values ('','','','','','','')";
$conexion->query($query);
$query= "insert into game_img(location, media_name) values ('Images/','dbz')";
$conexion->query($query);
?>
