<?php session_start();
 require('nav/head.php'); ?>
<?php require('nav/topbar.php')?>
<?php require('nav/sidebar.php')?>
<?php require('engine/core.php')?>
<?php 
	if(isset($_SESSION["permission"])){
	if($_SESSION["permission"]=="admin" || $_SESSION["permission"]=="user"){
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
                        <h2 class="page-title"><h2>&ensp;<i class="fas fa-plus"></i><i class="fas fa-users"></i> &ensp;Almacenar clientes</h2>
                    </div>
                </div>
            </div>
		<div class="col-md-6">
			<marquee><h4>
			Aquí puedes almacenar nuevos clientes.  Los usuarios aparecerán en la lista tras ser creados.  Si cometes un error, puedes eliminar estos usuarios desde la lista.
			</h4>
			</marquee>
		</div>
         <div class="container-fluid">
		 <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" action="engine/processing/clientinsertion.php" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Datos del usuario</h4></br>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre&ensp;<i class="fas fa-address-card"></i></label>
                                        <div class="col-sm-9">
                                            <input type="text" maxlength="30" class="form-control" id="user" name="nombre" placeholder="Nombre y apellidos de cliente" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Teléfono&ensp;<i class="fas fa-phone-square"></i></label>
                                        <div class="col-sm-9">
                                            <input type="number" onclick="maxkill(); return false" onmouseout="maxkill(); return false" class="form-control" id="telf" name="telf" placeholder="Número de teléfono" required="">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">e-mail&ensp;<i class="fas fa-envelope"></i></label>
                                        <div class="col-sm-9">
                                            <input type="text" maxlength="30" class="form-control" id="mail" name="mail" placeholder="regalens@regalens.re">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Dirección&ensp;<i class="fas fa-box"></i></label>
                                        <div class="col-sm-9">
                                            <input type="text" maxlength="30" class="form-control" id="address" name="address" placeholder="Domicilio del cliente">
                                        </div>
                                    </div>
									</br></br>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button onclick="wrong(); return false" class="btn btn-primary"><i class="fas fa-plus"></i>&ensp;Almacenar cliente</button>
                                    </div>
                                </div>
								<span id="passnotmatch">');if(isset($_GET['done'])){echo('<span style="color: green;"><b><h3> &ensp;<i class="fas fa-hand-holding"></i> Cliente almacenado correctamente</h3></b></span>');}
								if(isset($_GET['failed'])){echo('<span style="color: red;"><b><h3> &ensp;<i class="fas fa-exclamation-triangle"></i> El cliente ya existe</h3></b></span>');}echo('</span>
                            </form>
							<div class="border-top">
                                    <div class="card-body">
                                        <button type="submit "onclick=\'window.location.href="clientlist.php"\' class="btn btn-info"><i class="fas fa-arrow-circle-left"></i>&ensp;Volver a listado</button>
                                    </div>
                                </div>
							
                        </div>');
	}
}
if(!isset($_SESSION["permission"])){
		echo "<script>window.location = 'authentication-login.php?error=1'</script>";
	}
?>
<?php require('nav/footer.php')?>
        </div>
    </div>
</body>
</html>