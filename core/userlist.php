<?php session_start();
 require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php')?>
<?php 
if(isset($_SESSION["permission"])){
		if ($_SESSION["permission"]=="admin"){
			require ('dbjoin.php');
			$counter="0";
			$ask = "SELECT * from cliente where rango in ('user', 'admin');";
			$procesado = mysqli_query( $handshake, $ask);
			$rankspa ="";
			mysqli_close($handshake);
			echo '
			<div class="page-wrapper">
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-users"></i><i class="fas fa-hand-paper"></i> &ensp;Usuarios</h2>
                    </div>
                </div>
            </div>
			<div class="col-md-6">
			<marquee><h4>
				Aquí se muestra la lista de usuarios actualmente registrados en el sistema.&ensp;&ensp;&ensp;             
				</h4>
			</marquee>
			</div>
			 <div class="container-fluid">
			 <div class="row">
			<div class="col-12">
                    <div class="card">
                            <div class="card-body">    
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
										<tr style="color: blue; font-size: 17px;">
											<th><b>Nombre</b></th>
											<th><b>rango</b></th>
											<th style="text-align: center;"><b>-Opciones-</b></th>
										</tr>
                                        </thead>
										<tbody>';
								while ($row = mysqli_fetch_array($procesado)) {
								$counter++;
								echo('
                                    <tr>
										');if($row['rango']=="user"){$rankspa="Usuario";}
										else{$rankspa="Administrador";}echo('
                                        <td>'.($row['nombre']).'</td>
										<td>'.$rankspa.'</td>
										<td style="text-align: center;">
											&ensp;&ensp;
											<button onclick="window.location.href=\'usermodify.php?mod='.($row['id_cliente']).'\'" class="btn btn-outline-success"><i class=""></i>&ensp;Modificar usuario</button>
											&ensp;&ensp;&ensp;
											<script>function kk'.($row['id_cliente']).'(){ if (confirm(\'¿Seguro que quieres eliminar el usuario "'.($row['nombre']).'"\')) { window.location.href=\'engine/processing/userkill.php?mod='.($row['id_cliente']).'\';} } </script>
											<button onclick="kk'.($row['id_cliente']).'();return false" class="btn btn-outline-danger"><i class=""></i>&ensp;Eliminar usuario</button></td>
                                    </tr> 
								');}
								echo('
                                        </tbody>
                                    </table>
                                </div>
                            </div>
							<div class="border-top">
                                    <div class="card-body">
                                        <button onclick=\'window.location.href="users.php"\' class="btn btn-info"><i class="fas fa-plus"></i>&ensp;Registrar un nuevo usuario</button>
                                    </div>
                            </div>
							<span>');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Usuario eliminado correctamente</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Error al eliminar el usuario</h3></b></span>');}
								if(isset($_GET['lastadmin'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> No puedes eliminar al único administrador</h3></b></span>');}
								if(isset($_GET['failmod'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Error al actualizar</h3></b></span>');}
								if(isset($_GET['modified'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Usuario actualizado correctamente</h3></b></span>');}
								echo('</span>
							</div>
						</div>
					</div>
			</div>
	');}
	if($_SESSION["permission"]=="user"){
		echo'
			<div class="page-wrapper">
             <div class="page-breadcrumb">
					<div class="row">
						<div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-users"></i><i class="fas fa-hand-paper"></i> &ensp;Usuarios</h2>
                    </div>
					<div class="col-md-6">
						<marquee><h4>
			Aquí se muestra la lista de usuarios actualmente registrados en el sistema. <span style="color: red;">Cómo usuario no puedes realizar modificaciones ni acceder a esta información.</span>&ensp;&ensp;&ensp;             
			</h4>
			</marquee>
					</div>
                </div>
            </div>
			<br/><br/><br/><br/>
			 <div class="container-fluid">
                <div class="row">
			<div class="col-md-6 col-lg-2 col-xlg-3">
					<!-- Lugar ocupado por defecto -->
                        <div class="transcard">
                            <div class="transbox bg-none text-center">
                                <h1 class="font-light text-white"></h1>
                                <h6 class="text-white"></h6>
                            </div>
                        </div>
                    </div>
			<div class="col-md-6 col-lg-2 col-xlg-3">
				<div onclick=\'window.location.href="index.php"\' class="card card-hover">
					<div class="box bg-info text-center">
						<h1 class="font-light text-white"><i class="fas fa-arrow-left"></i><i class="fas fa-bolt"></i></h1>
						<h6 class="text-white">Volver al panel rápido</h6>
					</div>
				</div>
			</div>';
	}
}
if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
?>

        </div>
    </div>
	<?php require('nav/footer.php')?>
	<?php require('engine/tablefuel.php')?>
    </div>
</body>
</html>