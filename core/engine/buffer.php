<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$ticketno = gets("tick");
$number= gets("num");
$cantidad = gets("can");
$cliente = gets("cli");
require ('../dbjoin.php');
$put = "INSERT INTO ticket (id_ticket, id_producto, id_cliente, cantidad, aparcado, devuelto)
VALUES ($ticketno,$number,$cliente,$cantidad,0,0);";
echo ($put);
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
?>