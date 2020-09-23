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
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>'
    <script>
         $(document).ready( function () {
    $('#zero_config').DataTable();
} );


$('#zero_config').DataTable( {
    language: {
        processing:     "Procesando...",
        search:         "Buscar&nbsp;:",
        lengthMenu:    "Mostrar _MENU_ elementos",
        info:           "Mostrando elementos del _START_ al _END_ de un total de _TOTAL_ ",
        infoEmpty:      "Mostrando 0 de 0 de un total de 0 elementos",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No hay resultados",
        emptyTable:     "No hay contenidos en la tabla",
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Ultimo"
        },
        aria: {
            sortAscending:  ": orden ascendente",
            sortDescending: ": orden descendente"
        }
    }
} );
          </script>