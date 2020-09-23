<?php session_start();?>
<?php require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php')?>
<?php require('engine/core.php')?>
<?php 
	$session=true;
	if ($session==true){
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
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-plus"></i><i class="fas fa-users"></i> &ensp;Creación de usuarios</h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Aquí puedes registrar nuevos usuarios.  Los usuarios aparecerán en la lista tras ser creados.  Si cometes un error, puedes eliminar estos usuarios desde la lista.
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" action="engine/processing/userinsertion.php" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Datos del usuario</h4></br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Usuario</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="pass" name="pass" placeholder="*****" required="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname2" class="col-sm-3 text-right control-label col-form-label">Confirmar contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="passcontrol" placeholder="*****" required="">
                                        </div>
                                    </div>
									</br></br>
									<span><b><h4>Tipo de usuario a registrar (permisos)</h4></b></span></br>
										 <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="admin" id="customControlValidation1" name="radio" required>
                                            <label class="custom-control-label" for="customControlValidation1">Administrador</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="user" id="customControlValidation2" name="radio" required checked>
                                            <label class="custom-control-label" for="customControlValidation2">Usuario</label>
                                        </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button onclick="wrong(); return false" class="btn btn-info"><i class="fas fa-plus"></i>&ensp;Registrar usuario</button>
                                    </div>
                                </div>
								<span id="passnotmatch">');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Se ha creado el usuario</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> El usuario ya existe</h3></b></span>');}echo('</span>
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