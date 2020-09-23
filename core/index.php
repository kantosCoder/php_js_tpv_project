<?php session_start();
require('nav/head.php');
require('nav/topbar.php');
require('nav/sidebar.php');
require('engine/core.php'); 
	if(isset($_SESSION["permission"])){
		if ($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
			echo'
			<div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h1 class="page-title">Panel rápido <i class="fas fa-bolt"></i></h1>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
					<div class="col-md-6">
						<marquee><h4>
						Aquí puedes encontrar las funciones más comunes. ¡Prueba alguna para comenzar!
						</h4>
						</marquee>
					</div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div onclick="window.location = \'products.php\';" class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-content-save"></i><i class="fas fa-boxes"></i></h1>
                                <h6 class="text-white">Almacenar un producto</h6>
                            </div>
                        </div>
                    </div>';
					if ($_SESSION["permission"]=="admin"){
						echo'
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div onclick="window.location = \'users.php\';" class="card card-hover">
								<div class="box bg-cyan text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-pencil"></i><i class="fas fa-user-circle"></i></h1>
									<h6 class="text-white">Registrar nuevos usuarios</h6>
								</div>
							</div>
						</div>';
					}
					if ($_SESSION["permission"]=="user"){
						echo'
						<div class="col-md-6 col-lg-4 col-xlg-3">
							<div class="disabled card card-hover">
								<div class="box bg-secondary text-center">
									<h1 class="font-light text-white"><i class="mdi mdi-pencil"></i><i class="fas fa-user-circle"></i></h1>
									<h6 class="text-white">Registrar nuevos usuarios<span style="color: orange;">&ensp;(Solo Admin)</span></h6>
								</div>
							</div>
						</div>';
					}
					echo'
					
					<div class="col-md-6 col-lg-2 col-xlg-3">
					<!-- Lugar ocupado por defecto -->
                        <div class="transcard">
                            <div class="transbox bg-none text-center">
                                <h1 class="font-light text-white"></h1>
                                <h6 class="text-white"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div onclick="window.location = \'clients.php\';" class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-content-save"></i><i class="fas fa-users"></i></h1>
                                <h6 class="text-white">Almacenar un cliente</h6>
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 col-lg-2 col-xlg-3">
                        <div onclick="window.location = \'speedman.php\';" class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="fas fa-book"></i><i class="fas fa-bolt"></i></h1>
                                <h6 class="text-white">Manual de inicio rápido</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div onclick="killsession();return false" class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fas fa-power-off"></i></h1>
                                <h6 class="text-white">Cerrar sesión</h6>
                            </div>
                        </div>
                    </div>';
					if ($_SESSION["permission"]=="admin"){
						if (isset ($_SESSION["advanced"]) && $_SESSION["advanced"]>=6){
							echo '
							<div class="col-md-6 col-lg-2 col-xlg-3">
								<div onclick="window.location = \'secretroom.php\';" class="card card-hover">
									<div class="box bg-warning text-center">
										<h1 class="font-light text-white"><i class="fas fa-exclamation"></i></h1>
										<h6 class="text-white">Funciones avanzadas</h6>
									</div>
								</div>
							</div>
							';
						}
					}
					echo'</div></div>';
		}
	}
	if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
require('nav/footer.php')?>
        </div>
    </div>
</body>
</html>