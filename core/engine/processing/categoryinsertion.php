<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$nombre = gets("nombre");
require ('../../dbjoin.php');
$ask = "SELECT nombre_cat from categoria where nombre_cat = '$nombre';";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
require ('../../dbjoin.php');
if (mysqli_num_rows($procesado)==0){
$put = "INSERT INTO categoria (nombre_cat)
VALUES ('$nombre')";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../categories.php?done="1"');
exit;
}
else{header('Location: ../../categories.php?failed="1"');}
?>