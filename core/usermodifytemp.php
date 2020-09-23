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
				$rank=($row['rango']);
		}
		echo ('
		<script>	
			//sistema de control de contraseña (coinciden)
			var not ="";
			//sistema de control de length numero
			function maxkill (){

				if(document.getElementById("telf").value.length > 9){
					document.getElementById("telf").value=document.getElementById("telf").value.substring(0, 9)
				}
			}
		</script>
		    <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-edit"></i><i class="fas fa-users"></i><i class="fas fa-hand-paper"></i> &ensp;Modificación de usuario</h2>
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
                            <form class="form-horizontal" action="clientinsertion.php" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Datos del usuario</h4></br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre&ensp;<i class="fas fa-address-card"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$username.'" type="text" maxlength="30" class="form-control" id="user" name="nombre" placeholder="Nombre y apellidos de cliente" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Teléfono&ensp;<i class="fas fa-phone-square"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$tlf.'" type="number" onclick="maxkill(); return false" onmouseout="maxkill(); return false" class="form-control" id="telf" name="telf" placeholder="Número de teléfono" required="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">e-mail&ensp;<i class="fas fa-envelope"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$mail.'" type="text" maxlength="30" class="form-control" id="mail" name="mail" placeholder="regalens@regalens.re">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Dirección&ensp;<i class="fas fa-box"></i></label>
                                        <div class="col-sm-9">
                                            <input value="'.$add.'" type="text" maxlength="30" class="form-control" id="address" name="address" placeholder="Domicilio del cliente">
                                        </div>
                                    </div>
									</br></br>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button onclick="wrong(); return false" class="btn btn-primary"><i class="fas fa-plus"></i>&ensp;Guardar cambios</button>
                                    </div>
                                </div>
								<span id="passnotmatch">');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Cliente almacenado correctamente</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> El cliente ya existe</h3></b></span>');}echo('</span>
                            </form>
							<div class="border-top">
                                    <div class="card-body">
                                        <button type="submit "onclick=\'window.location.href="clientlist.php"\' class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>&ensp;Volver a listado (descartar)</button>
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