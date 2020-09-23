<?php if(!isset($tpv)){
session_start();
	require('nav/head.php');
	require('nav/topbar.php');
	require('nav/sidebar.php');
}
if(isset($_SESSION["permission"])){
	if($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
		require ('dbjoin.php');
		$counter="0";
		$ask = "SELECT * from cliente where rango = 'client';";
		$procesado = mysqli_query( $handshake, $ask);
		mysqli_close($handshake);
		if(!isset($tpv)){
		echo('
		    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-users"></i><i class="fas fa-dollar-sign"></i> &ensp;Clientes</h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Aquí se muestra la lista de clientes actualmente almacenados en el sistema.&ensp;&ensp;&ensp;             
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">');
	}
		 echo('<div class="row">
			<div class="col-12">
                    <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
										<tr style="color: darkblue; font-size: 17px;">
											<th><b>Nombre</b></th>
											<th><b>Teléfono</b></th>
											<th><b>Correo</b></th>
											<th><b>Direccion</b></th>
											<th style="text-align: center;"><b>-Opciones-</b></th>
										</tr>
                                        </thead>
										<tbody>');
								while ($row = mysqli_fetch_array($procesado)) {
								echo('
                                    <tr>
                                        <td>'.($row['nombre']).'</td>
										<td>'.($row['telefono']).'</td>
										<td>'.($row['email']).'</td>
										<td>'.($row['direccion']).'</td>
										<td style="text-align: center;">
										&ensp;&ensp;
										<button onclick="window.location.href=\'clientmodify.php?mod='.($row['id_cliente']).'\'" class="btn btn-outline-success"><i class=""></i>&ensp;Modificar cliente</button>
										&ensp;&ensp;&ensp;
										');if ($_SESSION["permission"]=="admin"){echo ('
										<script>function kk'.($row['id_cliente']).'(){ if (confirm(\'¿Seguro que quieres eliminar el cliente "'.($row['nombre']).'"\')) { window.location.href=\'engine/processing/clientkill.php?mod='.($row['id_cliente']).'\';} } </script>
										<button onclick="kk'.($row['id_cliente']).'();return false" class="btn btn-outline-danger"><i class=""></i>&ensp;Eliminar cliente</button></td>
										');}echo ('
                                    </tr> 
								');}
								echo('
                                        </tbody>
                                    </table>
                                </div>
                            </div>
							<div class="border-top">
                                    <div class="card-body">
                                        <button onclick=\'window.location.href="clients.php"\' class="btn btn-primary"><i class="fas fa-plus"></i>&ensp;Almacenar un nuevo cliente</button>
                                    </div>
                            </div>
							
							<span>');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Cliente eliminado correctamente</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Error al eliminar el cliente</h3></b></span>');}
								if(isset($_GET['failmod'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Error al actualizar</h3></b></span>');}
								if(isset($_GET['modified'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Cliente actualizado correctamente</h3></b></span>');}
								echo('</span>
                        </div>
					 </div>
				  </div>
	</div><?php
	');}
}
if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
if(!isset($tpv)){
require('nav/footer.php');
require('engine/tablefuel.php');
echo('			</div>
		</div>
    </div>
</body>
</html>');}