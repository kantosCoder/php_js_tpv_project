<?php session_start();
require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php')?>
<?php require('engine/core.php')?>
<?php 
	$session=true;
	if ($session==true){
		$id=$_GET['mod'];
		require ('dbjoin.php');
		$counter="0";
		$ask = "SELECT * from cliente where id_cliente = '$id';";
		$procesado = mysqli_query( $handshake, $ask);
		mysqli_close($handshake);
		while ($row = mysqli_fetch_array($procesado)) {
				$username=($row['nombre']);
				$pass=($row['password']);
				$rank=($row['rango']);
		}
		echo ('
		<script>
			//sistema de control de contraseña (coinciden)
			var not ="";
			function wrong (){

				if(document.getElementById("pass").value != not && document.getElementById("passcontrol").value != not){
					if (document.getElementById("pass").value==document.getElementById("passcontrol").value){
						document.getElementsByClassName("form-horizontal")[0].submit();
					}
					else{document.getElementById("passnotmatch").innerHTML=\'<span style="color: red;"><b><h3>&ensp; <i class="fas fa-exclamation-triangle"></i> Las contraseñas no coinciden</h3></b></span>\'}
				}
				else{document.getElementById("passnotmatch").innerHTML=\'<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Rellena todos los campos</h3></b></span>\'}
			}
		</script>
		    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-edit"></i><i class="fas fa-users"></i><i class="fas fa-hand-paper"></i> &ensp;Modificación de usuarios</h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Estás modificando el usuario "'.$username.'." Todos los cambios realizados se verán reflejados en su campo.&ensp;&ensp;
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" action="engine/processing/userupdate.php?mod='.$id.'" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Datos del usuario "'.$username.'" &ensp;&ensp;'); if($rank=="admin"){echo'(permisos: <b>"Administrador"</b>)';}else{echo'(permisos: <b>"Usuario"</b>)';}
									echo ('
									</h4></br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Usuario</label>
                                        <div class="col-sm-9">
                                            <input value="'.$username.'" type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Contraseña</label>
                                        <div class="col-sm-9">
                                            <input value="'.$pass.'" type="password" class="form-control" id="pass" name="pass" placeholder="*****" required="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname2" class="col-sm-3 text-right control-label col-form-label">Confirmar contraseña</label>
                                        <div class="col-sm-9">
                                            <input value="'.$pass.'" type="password" class="form-control" id="passcontrol" placeholder="*****" required="">
                                        </div>
                                    </div>
									</br></br>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button onclick="wrong(); return false" class="btn btn-info"><i class="fas fa-plus"></i>&ensp;Guardar cambios</button>
                                    </div>
                                </div>
								<span id="passnotmatch">');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Se ha actualizado el usuario</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> Error</h3></b></span>');}echo('</span>
                            </form>
							<div class="border-top">
                                    <div class="card-body">
                                        <button type="submit "onclick=\'window.location.href="userlist.php"\' class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>&ensp;Volver a listado</button>
                                    </div>
                                </div>
							
                        </div>');
	}
	else{ echo'<br/><br/><br/><br/><H1 style="color: red; text-align: center;">NO ESTAS AUTORIZADO A VISUALIZAR ESTE CONTENIDO</H1><br/><br/><br/><br/><br/><br/><br/><br/><br/>';}
?>
<?php require('nav/footer.php')?>
        </div>
    </div>
</body>
</html>