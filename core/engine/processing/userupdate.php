<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$id=$_GET["mod"];
$name=gets("user");
$pass=gets("pass");
require ('../../dbjoin.php');
$put = "UPDATE cliente SET 
nombre= '$name', 
password = '$pass'
where id_cliente ='$id'";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../userlist.php?modified="1"');
?>