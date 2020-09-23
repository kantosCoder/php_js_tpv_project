<?php
$id = $_GET["mod"];
require ('../../dbjoin.php');
$ask = "SELECT * from productos where id_producto = '$id';";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);

if (mysqli_num_rows($procesado)==1){
require ('../../dbjoin.php');
$put = "DELETE from categoria_producto where id_producto = '$id'";
$kill = mysqli_query( $handshake, $put);
mysqli_close($handshake);
require ('../../dbjoin.php');
$put = "DELETE from productos where id_producto = '$id'";
$kill = mysqli_query( $handshake, $put);
header('Location: ../../productlist.php?done="1"');
mysqli_close($handshake);
exit;
}
else{header('Location: ../../productlist.php?failed="1"');}