<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$id=0;
$idcat = gets("categoria");
$nombre = gets("nombre");
$pu = gets("price");
$pvp = gets("pvp");
$code = gets("codigo");
$iva = gets("IVA");
$stock = gets("stock");
require ('../../dbjoin.php');
$ask = "SELECT nombre from productos where nombre = '$nombre';";
$procesado = mysqli_query( $handshake, $ask);
mysqli_close($handshake);
require ('../../dbjoin.php');
if (mysqli_num_rows($procesado)==0){
$put = "INSERT INTO productos (nombre, precio_unidad, PVP, codigo_barras, IVA, stock)
VALUES ('$nombre', '$pu', '$pvp', '$code', '$iva', '$stock')";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);

require ('../../dbjoin.php');
$ask = "SELECT * from productos where nombre = '$nombre';";
$procesado = mysqli_query( $handshake, $ask);
while ($row = mysqli_fetch_array($procesado)) {
			$id=$row['id_producto'];
						}
mysqli_close($handshake);

require ('../../dbjoin.php');
$put = "INSERT INTO categoria_producto (id_producto, id_categoria)
VALUES ('$id', '$idcat')";
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
header('Location: ../../products.php?done="1"');
exit;
}
else{header('Location: ../../products.php?failed="1"');}
?>