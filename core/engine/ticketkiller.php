<?php
function gets($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}
$ticketno = gets("tick");
require ('../dbjoin.php');
$put = "DELETE from ticket where id_ticket= '$ticketno'";
echo ($put);
$procesado = mysqli_query( $handshake, $put);
mysqli_close($handshake);
?>