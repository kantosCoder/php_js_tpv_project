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
	<style>
</style>
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
        infoEmpty:      "Mostrando 0 de 0 de un total de 0 elementos",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No hay resultados",
        emptyTable:     "No hay contenidos en la tabla",
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
						<div class="card">
									<div  class="card-body">
									<span style="font-size: 25px;"><b>//CATEGORÍAS &ensp;</b><i class="fas fa-level-down-alt"></i></span>
										<div style="margin-left: 40px;" class="table-responsive">
												<table style ="border: none;" id="zero_config" class="table table-bordered">
												<thead>
												<tr>
												<th style ="border: none;"></th>
												</tr>
												</thread>
												<tbody>
							<?php
							require ('dbjoin.php');
							$ask = "SELECT * from categoria;";
							$procesado = mysqli_query( $handshake, $ask);
							mysqli_close($handshake);
							$cont = 2;
											while ($row = mysqli_fetch_array($procesado)) {
												echo('<tr style ="border: none;">
														<td style ="border: none;">
														<div style="margin-bottom:-15px; width: 150px; height; 40px;" onclick="objectloader('.($row['id_categoria']).'); return false;" class="card card-hover">
															<div style=" width: 150px; height; 40px;" class="box bg-info text-center">
																<span class="font-light text-white" style="font-size: 12px;"><b>'.($row['nombre_cat']).'</b></span>
															</div>
														</div>
														</td>
												</tr>');
											}
								?>
											</tbody>
										
											</table>
											
							<br/>
										</div>
									</div>
							</div>
