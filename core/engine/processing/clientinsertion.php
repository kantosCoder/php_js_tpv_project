<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$privilege = "client";
$ph = gets("telf");
$nombre = gets("nombre");
$add = gets("address");
$mail = gets("mail");
$pass = "NONE";
require ('../../dbjoin.php');
$ask = "SELECT nombre from cliente where nombre = '$nombre' and rango = 'client';";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
require ('../../dbjoin.php');
if (mysqli_num_rows($procesado)==0){
$put = "INSERT INTO CLIENTE (nombre, password, rango, telefono, direccion, email)
VALUES ('$nombre', '$pass', '$privilege', '$ph', '$add', '$mail')";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../clients.php?done="1"');
exit;
}
else{header('Location: ../../clients.php?failed="1"');}
?>