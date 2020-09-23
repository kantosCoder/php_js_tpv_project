<?php
$tick=($_POST["tick"]);
			require ('../dbjoin.php');
			$controller = 0;
			$put = "select p.nombre, t.id_producto, p.precio_unidad, t.cantidad from productos p, ticket t where id_ticket = $tick and aparcado = 1 and t.id_producto = p.id_producto;";
			$procesado = mysqli_query( $handshake, $put);
			mysqli_close($handshake);
			while ($row = mysqli_fetch_array($procesado)) {
			$controller = $controller+1;
			echo (''.$tick.'
				var item'.$controller.' = "'.($row['nombre']).'";
				var num'.$controller.' = '.($row['id_producto']).';
				var precio'.$controller.' = '.($row['precio_unidad']).';
				for (i=0; i<'.($row['cantidad']).'; i++){
					buffer(item'.$controller.',num'.$controller.',precio'.$controller.');
				}');}
			?>