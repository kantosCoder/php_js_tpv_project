<?php
	require ('dbjoin.php');
	$put = "select * from ticket t, cliente c where aparcado = 1 and t.id_cliente = c.id_cliente and devuelto = 0 group by id_ticket;";
	$procesado = mysqli_query( $handshake, $put);
	mysqli_close($handshake);
	while ($row = mysqli_fetch_array($procesado)) {
	echo (utf8_encode('
	<tr>
		<td>'.($row['nombre']).'</td><td></td><td>'.($row['id_ticket']).'</td><td></td><td><button onclick="rebuild('.($row['id_ticket']).'); return false;" type="button" class="btn btn-outline-success" data-dismiss="modal">Restaurar</button></td>
	</tr>	
	'));}
?>