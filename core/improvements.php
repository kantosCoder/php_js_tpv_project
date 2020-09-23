<?php session_start(); 
?>
<?php require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php');
	if(isset($_SESSION["permission"])){
		if ($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
		if (isset($_GET["s"])){
			if(!isset($_SESSION["advanced"])){
				$_SESSION["advanced"]=0;
			}
				$_SESSION["advanced"]++;
		}
		echo '
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-keyboard"></i>&ensp;<a href="info.php?s=1"><i class="fas fa-info"></i></a> 
						&ensp;Información y manuales //<b>Mejoras a especificaciones</b><a href="info.php"> &ensp;<i class="far fa-arrow-alt-circle-left"></i></a></h2></h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Mejoras sobre las especificaciones FEMPA.&ensp;&ensp;&ensp;             
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
			<div class="col-12">
                        <div class="card card-body printableArea">
                         <span><h3>Detallo en una lista no ordenada los puntos que he creido conveniente modificar con su respectia explicación:</h3></span><br/>
						 <ul><h4>
							<li>He escondido el codigo de barras en la lista de productos por no ser relevante y ocupar mucho espacio
							de la tabla, sin embargo, se puede seguir viendo durante la modificación.</li><br/>
							<li>He introducido un Menú secreto para funciones avanzadas. Para desbloquearlo, se debe iniciar sesión como administrador,<br/> 
							dirigirse a información y pulsar 6 veces sobre la "i" azul. entonces este menú oculto estará disponible en el panel rápido.</li><br/>
							<li>Se ha eliminado el botón de la barra de navegación de usuarios cuando tienes permiso de empleado.
							pero se ha conservado el botón en modo "desactivado" en el panel rápido para que no haga hueco "feo".</li><br/>
							<li>Con nivel de permisos de "usuario" se pueden modificar clientes y productos, pero no eliminarlos</li><br/>
							<li>Arriba, en la topbar, he introducido un mensaje de bienvenida que dependiendo de la hora, te da las buenas noches, días o tardes.</li><br/>
							</h4>
						 </ul>
                    </div>
                </div>
		</div>';}
	}
	if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
			?>
<?php require('nav/footer.php')?>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
</body>

</html>