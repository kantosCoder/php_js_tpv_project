<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$id=$_GET["mod"];
$name=gets("nombre");
$tlf=gets("telf");
$mail=gets("mail");
$add=gets("address");
require ('../../dbjoin.php');
$put = "UPDATE cliente SET 
nombre= '$name', 
telefono = '$tlf',
direccion = '$add',
email = '$mail'
where id_cliente ='$id'";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../clientlist.php?modified="1"');
?>