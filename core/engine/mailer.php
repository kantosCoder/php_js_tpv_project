<?php
$ticket = ($_POST["tick"]);
$type = ($_POST["type"]);
$destinatario = "kantosdead@gmail.com"; 
$asunto = "Su compra en Regalens"; 
if($type == "buy"){
$message = 'GRACIAS POR TU COMPRA!  Tu factura es la nº"'.$ticket.'"
 ----------------------- 
 
 Gracias por comprar en nuestra tienda, puedes descargar la factura en nuestra web.
';}
if($type == "return"){
$message = 'Has tramitado la devolucion de la factura nº"'.$ticket.'"
 ----------------------- 
 
 Sentimos que tengas que tramitar esta devolucion, esperamos verte pronto.
';
}

$headers = "From: Regalens <info@regalens.com>\r\n"; 
mail($destinatario,$asunto,$message,$headers);
?>