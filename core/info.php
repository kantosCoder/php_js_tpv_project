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
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-keyboard"></i>&ensp;<a href="info.php?s=1"><i class="fas fa-info"></i></a> &ensp;Información y manuales</h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Aquí puedes acceder a los manuales y a toda la información relacionada con el sistema Regalens.&ensp;&ensp;&ensp;             
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
			<div class="col-12">
                        <div class="card card-body printableArea">
                            <h3><b>Información de la aplicación</b></h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
									<span>Regalens es una aplicación web para gestionar TPV desarrollada por Héctor Cantos<br/><br/>
									Actualmente <b>Regalens </b>se encuentra en la <b>versión 0.5</b></span>
                                    </div>
								</div>
                            </div>
                        </div>
						<div class="card card-body printableArea">
                            <h3><b>Manuales y documentación disponible:</b></h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
									<ul>
										<li>-<a href="speedman.php">Manual de inicio rápido</a></li>
										<li>-<a href="database.php">Modelo relacional/entidad relacion de la base de datos</a></li>
										<li>-Resolución de problemas (proximamente)</li>
										<li>-<a href="improvements.php">Mejoras respecto a las especificaciones requeridas</a></li>
									</ul>
                                    </div>
								</div>
                            </div>
                        </div>
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