<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$ph = "0";
$privilege= gets("radio");
$nombre = gets("user");
$pass = gets("pass");
require ('../../dbjoin.php');
$ask = "SELECT nombre from cliente where nombre = '$nombre';";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
require ('../../dbjoin.php');
if (mysqli_num_rows($procesado)==0){
$put = "INSERT INTO CLIENTE (nombre, password, rango, telefono)
VALUES ('$nombre', '$pass', '$privilege', '$ph')";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../users.php?done="1"');
exit;
}
else{header('Location: ../../users.php?failed="1"');}
?>