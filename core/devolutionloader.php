<?php
	require ('dbjoin.php');
	$put = "select * from ticket t, cliente c where t.id_cliente = c.id_cliente and devuelto = 0 and aparcado = 0 group by id_ticket;";
	$procesado = mysqli_query( $handshake, $put);
	mysqli_close($handshake);
	while ($row = mysqli_fetch_array($procesado)) {
	echo (utf8_encode('
	<tr>
		<td>'.($row['nombre']).'</td><td></td><td>'.($row['id_ticket']).'</td><td></td><td><button onclick="devuelve('.($row['id_ticket']).'); return false;" type="button" class="btn btn-outline-warning" data-dismiss="modal">Tramitar devoluci&oacute;n</button></td>
	</tr>	
	'));}
?>