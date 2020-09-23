<?php
$ticket = ($_POST["tick"]);
$destinatario = "kantosdead@gmail.com"; 
$asunto = "Su devolucion en Regalens"; 
$message = 'Has tramitado la devolucion de la factura nº"'.$ticket.'"
 ----------------------- 
 
 Sentimos que tengas que tramitar esta devolucion, esperamos verte pronto.
';
$headers = "From: Regalens <info@regalens.com>\r\n"; 
mail($destinatario,$asunto,$message,$headers);
?>