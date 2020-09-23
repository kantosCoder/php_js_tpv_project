<?php
$id = $_GET["mod"];
require ('../../dbjoin.php');
$ask = "SELECT * from cliente where id_cliente = '$id' and rango = 'client';";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
require ('../../dbjoin.php');
if (mysqli_num_rows($procesado)==1){
$put = "DELETE from cliente where id_cliente= '$id'";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../clientlist.php?done="1"');
exit;
}
else{header('Location: ../../clientlist.php?failed="1"');}