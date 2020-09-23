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
$price=gets("price");
$sell=gets("pvp");
$code=gets("codigo");
$iva=gets("IVA");
$stock=gets("stock");
require ('../../dbjoin.php');
$ask = "SELECT nombre from productos where nombre = '$name';";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
require ('../../dbjoin.php');
if (mysqli_num_rows($procesado)==0){
$put = "UPDATE productos SET 
nombre= '$name', 
precio_unidad = '$price',
PVP = '$sell',
codigo_barras = '$code',
IVA = '$iva', 
stock= '$stock'
where id_producto ='$id'";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../productlist.php?done="1"');
exit;
}
else{header('Location: ../../productlist.php?failed="1"');}
?>