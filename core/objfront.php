	<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
 $(document).ready( function () {
    $('#zero_config').DataTable();
} );


$('#zero_config').DataTable( {
	bLengthChange: false,
	bFilter: false,
	ordering: false,
	pageLength: 5,
	sPaginationType: "simple",
	bScrollCollapse: false,
    language: {
        processing:     "Procesando...",
        search:         "Buscar&nbsp;:",
        lengthMenu:    "",
        info:           "",
        infoEmpty:      "",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No hay resultados",
        emptyTable:     "No hay productos en esta categoría",
        paginate: {
            first:      "Primero",
            previous:   "<b><</b>",
            next:       "<b>></b>",
            last:       "Ultimo"
        },
        aria: {
            sortAscending:  ": orden ascendente",
            sortDescending: ": orden descendente"
        }
    }
} );
          </script>
						<?php
							$cat=$_POST["object"]; 
							require ('dbjoin.php');
							$ask = 'SELECT * from categoria where id_categoria = '.$cat.';';
							$procesado = mysqli_query( $handshake, $ask);
							while ($row = mysqli_fetch_array($procesado)) {$coolname = ($row['nombre_cat']);}
							mysqli_close($handshake);?>
						<div class="card">
									<div class="card-body">
									<div style="float: left; width: 30px;" onclick="catloader(); return false;" class="card card-hover">
												<div style="height:35px; width:35px;" class="box bg-info text-center">
												<h1 class="font-light text-white" style="font-size: 18px;"><i class="fas fa-undo-alt"></i></h1>
												</div>
												</div>
									<span style="font-size: 25px;"><b>&ensp;//ARTICULOS de "<?php echo($coolname);?>"</span>
										<div class="table-responsive">
												<table style ="border: none;" id="zero_config" class="table table-bordered">
												<thead>
												<tr>
												<th style ="border: none;"></th>
												</tr>
												</thread>
												<tbody>
							<?php
							require ('dbjoin.php');
							$ask = 'SELECT * from productos p, categoria c, categoria_producto k where c.id_categoria = 
							k.id_categoria and p.id_producto = k.id_producto and c.id_categoria = '.$cat.';';
							$procesado = mysqli_query( $handshake, $ask);
							mysqli_close($handshake);
							$cont = 2;
											while ($row = mysqli_fetch_array($procesado)) {
												echo('<tr style ="border: none;">
														<td style ="border: none;">
														<div style="margin-bottom:-15px; width: 150px; height; 40px;" onclick="buffer(\''.($row['nombre']).'\','.($row['id_producto']).','.($row['precio_unidad']).');return false;" class="card card-hover">
															<div style=" width: 150px; height; 40px;" class="box bg-info text-center">
																<span class="font-light text-white" style="font-size: 12px;">'.($row['nombre']).'</span>
															</div>
														</div>
														</td>
												</tr>');
											}
								?>
											</tbody>
												
											</table>
									</div>
								</div>
							<br/>
										</div>
									</div>
							</div>
